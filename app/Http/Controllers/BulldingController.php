<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\BulldingRequest;
use App\Bullding;
use Auth;
use Datatables;
use Html;
use DB;

class BulldingController extends Controller
{
   public function index()
   {
      return view('admin.bullding.index');
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      return view('admin.bullding.add');
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(BulldingRequest $request, Bullding $bullding)
   {
      $user = Auth::user();
      $data = [
         'name'          => $request->name,
         'price'         => $request->price,
         'rent'          => $request->rent,
         'square'        => $request->square,
         'type'          => $request->type,
         'small_dis'     => $request->small_dis,
         'meta'          => $request->meta,
         'langtuide'     => $request->langtuide,
         'latitiute'     => $request->latitiute,
         'decription'    => $request->decription,
         'status'        => $request->status,
         'rooms'         => $request->rooms,
         'user_id'       => $user->id,
      ];
      $bullding->create($data);
      return redirect()->route('admin.bulldings.index')->with(['success' => 'The Bullding Created Successfully']);
   }

   public function edit($id)
   {
      $bullding = Bullding::findOrFail($id);
      return view('admin.bullding.edit', compact('bullding'));
   }

   public function update(BulldingRequest $request, $id)
   {
      $bulldingUpdate = Bullding::findOrFail($id);
      $bulldingUpdate->fill($request->all())->save();
      return redirect()->back()->with(['success' => 'The Bullding Updated Successfully']);
   }

   public function destroy($id)
   {
      $bulldingDelete = Bullding::findOrFail($id);
      $bulldingDelete->delete();
      return redirect()->route('admin.bulldings.index')->with(['success' => 'The Bullding deleted Successfully']);
   }

   public function anyData(Bullding $bullding)
   {
      $bulldings = $bullding->all();

      $data = DataTables::of($bulldings)

      ->editColumn('name', function ($model) {
         return Html::link(''.route("admin.bulldings.edit", ['user_id' => $model->id]).'', $model->name );
      })
      ->editColumn('type', function ($model) {
         $type = type();
         return '<span class="badge badge-info">'. $type[$model->type] .'</span>';
      })
      ->editColumn('status', function ($model) {
         return $model->status == 0 ? '<span class="badge badge-info">'.'Not Active'.'</span>' : '<span class="badge badge-info">'.'Active'.'</span>';
      })
      ->editColumn('actions', function ($model) {
         $all = '<a href="'.route("admin.bulldings.edit", ['id' => $model->id]).'" class="btn btn-info btn-block"><i class="fa fa-edit"></i> Edit</a>';
         $all .= '<a href="'. route('admin.bulldings.destroy', ['id' => $model->id]) .'" class="btn btn-danger btn-block"><i class="fa fa-close"></i> Delete</a>';

         return $all;
      })
      ->make(true);
      return $data;

   }

   public function showAllEnabled(Bullding $bullding)
   {
      $bulldingAll = $bullding->where('status', 1)->orderBy('id', 'DESC')->paginate(3, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function showRentEnabled(Bullding $bullding)
   {
      $bulldingAll = $bullding->where(function($q) {
         $q->where('status', 1)
         ->where('rent', 0);
      })->orderBy('id', 'DESC')->paginate(3, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function showOwnEnabled(Bullding $bullding)
   {
      $bulldingAll = $bullding->where(function($q) {
         $q->where('status', 1)
         ->where('rent', 1);
      })->orderBy('id', 'DESC')->paginate(3, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function showApartmentEnabled(Bullding $bullding)
   {
      $bulldingAll = $bullding->where(function($q) {
         $q->where('status', 1)
         ->where('type', 0);
      })->orderBy('id', 'DESC')->paginate(3, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function showShalehEnabled(Bullding $bullding)
   {
      $bulldingAll = $bullding->where(function($q) {
         $q->where('status', 1)
         ->where('type', 1);
      })->orderBy('id', 'DESC')->paginate(3, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function showHomeEnabled(Bullding $bullding)
   {
      $bulldingAll = $bullding->where(function($q) {
         $q->where('status', 1)
         ->where('type', 2);
      })->orderBy('id', 'DESC')->paginate(3, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function search(Request $request, Bullding $bullding)
   {
      /**
      * @return laravel way
      */
      // get all the data except the submit and the _token
      $requestAll = array_except($request, ['submit', '_token', 'bullding']);
      // select
      $query = DB::table('bulldings')->select('*');
      // prepare the container as array
      $array = [];
      // count all the fields
      $count = count($requestAll->toArray());
      // make $i for advanced search trick
      $i = 0;
      // loop for the data
      foreach($requestAll->all() as $key => $req) {
         $i++;
         // check
         if ($req !== '') {
            //check the price
            if ($key == 'price_from' && $request->price_to === '') {
               $query->where('price', '>=', $req);
            } else if ($key == 'price_to' && $request->price_from === '') {
               $query->where('price', '<=', $req);
            } else {
               if ($key !== 'price_from' && $key !== 'price_to') {
                  // get and assign the data
                  $query->where($key, '=', $req);
               }
            }
            $array[$key] = $req;

         } else if($count == $i && $request->price_from !== '' && $request->price_to !== ''){
            // if the $i is the final thing in the loop it will get here.
            $query->whereBetween('price', [$request->price_from, $request->price_to]);
            $array[$key] = $req;
         }
      }

      $bulldingAll = $query->orderBy('id', 'DESC')->paginate(3, ['*'], 'bullding');
      return view('website.bullding.index', compact('bulldingAll', 'array'));

      /**
      * @return native way
      *   // $requestAll = array_except($request, ['submit', '_token']);
      *   // $out = '';
      *   // $i = 0;
      *   // foreach($requestAll->all() as $key => $req) {
      *   //    if ($req !== '') {
      *   //       $where = $i == 0 ? ' where ' : ' and ';
      *   //       $out .= $where .' '. $key .' = ' .$req;
      *   //       $i = 2;
      *   //    }
      *   // }
      *   // $query = "SELECT * FROM bulldings" . $out;
      *   // $bulldingAll = DB::select($query);
      */
   }
}
