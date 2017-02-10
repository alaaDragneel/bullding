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
   public function index(Request $request)
   {
      $id = $request->id !== null ? '?userId='.$request->id : null;
      return view('admin.bullding.index', compact('id'));
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
      if ($request->file('image')) {
         $file = image($request->image);
         if ($file == '') {
            return redirect()->back()->with(['fail' => 'please Choose An Image 500 * 362']);
         }
         $image = 'src/images/bullding/' . $file;
      } else {
         $image = avatar();
      }
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
         'place'         => $request->place,
         'image'         => $image,
         'month'         => date('m'),
         'year'         => date('Y'),
         'user_id'       => $user->id,
      ];
      $bullding->create($data);

      return redirect()->route('admin.bulldings.index')->with(['success' => 'The Bullding Created Successfully']);
   }

   public function edit($id)
   {
      $bullding = Bullding::findOrFail($id);
      $user = $bullding->user()->first();
      return view('admin.bullding.edit', compact('bullding', 'user'));
   }

   public function update(BulldingRequest $request, $id)
   {
      $bulldingUpdate = Bullding::findOrFail($id);
      $bulldingUpdate->fill(array_except($request->all(), 'image'))->save();

      if ($request->file('image')) {
         $file = image($request->image, false, $bulldingUpdate->image);
         if ($file == '') {
            return redirect()->back()->with(['fail' => 'please Choose An Image 1440 * 1920']);
         }
         $bulldingUpdate->fill(['image' => 'src/images/bullding/' . $file])->save();
      }


      return redirect()->back()->with(['success' => 'The Bullding Updated Successfully']);
   }

   public function destroy($id)
   {
      $bulldingDelete = Bullding::findOrFail($id);
      $bulldingDelete->delete();
      return redirect()->route('admin.bulldings.index')->with(['success' => 'The Bullding deleted Successfully']);
   }

   public function anyData(Request $request, Bullding $bullding)
   {
      if ($request->userId) {
         $bulldings = $bullding->where('user_id', $request->userId)->get();
      } else {
         $bulldings = $bullding->all();
      }

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
      $bulldingAll = $bullding->where('status', 1)->orderBy('id', 'DESC')->paginate(6, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function showRentEnabled(Bullding $bullding)
   {
      $bulldingAll = $bullding->where(function($q) {
         $q->where('status', 1)
         ->where('rent', 0);
      })->orderBy('id', 'DESC')->paginate(6, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function showOwnEnabled(Bullding $bullding)
   {
      $bulldingAll = $bullding->where(function($q) {
         $q->where('status', 1)
         ->where('rent', 1);
      })->orderBy('id', 'DESC')->paginate(6, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function showApartmentEnabled(Bullding $bullding)
   {
      $bulldingAll = $bullding->where(function($q) {
         $q->where('status', 1)
         ->where('type', 0);
      })->orderBy('id', 'DESC')->paginate(6, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function showShalehEnabled(Bullding $bullding)
   {
      $bulldingAll = $bullding->where(function($q) {
         $q->where('status', 1)
         ->where('type', 1);
      })->orderBy('id', 'DESC')->paginate(6, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function showHomeEnabled(Bullding $bullding)
   {
      $bulldingAll = $bullding->where(function($q) {
         $q->where('status', 1)
         ->where('type', 2);
      })->orderBy('id', 'DESC')->paginate(6, ['*'], 'bullding');

      return view('website.bullding.index', compact('bulldingAll'));
   }

   public function search(Request $request, Bullding $bullding)
   {
      /**
      * @return laravel way
      */
      // get all the data except the submit and the _token
      $requestAll = array_except($request->toArray(), ['submit', '_token', 'bullding']);
      // select
      $query = DB::table('bulldings')->select('*');
      // prepare the container as array
      $array = [];
      // count all the fields
      $count = count($requestAll);
      // make $i for advanced search trick
      $i = 0;
      // loop for the data
      foreach($requestAll as $key => $req) {
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

      $bulldingAll = $query->orderBy('id', 'DESC')->paginate(6, ['*'], 'bullding');
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

   /**
   * this function used to view the single bullding details
   * @var $id
   * @var $bullding
   * @return single view
   */
   public function singleShow($id, Bullding $bullding)
   {
      // find the bullding by id
      $bulldingInfo = $bullding->findOrFail($id);
      if ($bulldingInfo->status == 0) {
         $messageTitle = 'This Bullding Waiting Admin Permetion';
         $messageBody = "Building $bulldingInfo->name Is Found But Waiting Admin Permetion This Building Will Publish In Maximum 24 Hours";
         return view('website.bullding.noPermation', compact('bulldingInfo', 'messageTitle', 'messageBody'));
      }
      // same rent
      $sameRent = $bullding->where(function ($q) use($bulldingInfo) {
         $q->where('rent', $bulldingInfo->rent)
            ->where('status', 1);
      })->orderBy(DB::raw('RAND()'))->take(3)->get();
      // same Type
      $sameType = $bullding->where(function ($q) use($bulldingInfo) {
         $q->where('type', $bulldingInfo->type)
            ->where('status', 1);
      })->orderBy(DB::raw('RAND()'))->take(3)->get();
      return view('website.bullding.singleBullding', compact('bulldingInfo', 'sameRent', 'sameType'));
   }

   /**
   * this function used to view the bullding details for the welcome page via ajax
   * @var Bullding $bullding
   * @return view
   */

   public function ajaxInfo(Request $request, Bullding $bullding)
   {
      // find the bullding by id
      return $bulldingInfo = $bullding->findOrFail($request->id)->toJson();
   }

   /**
   * this function used to view the users add bullding
   * @return view
   */

   public function usersAddView()
   {
      return view('website.usersBullding.usersAdd');
   }

   /**
   * Store a newly created resource in storage For User.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

   public function usersStore(BulldingRequest $request, Bullding $bullding)
   {
      if ($request->file('image')) {
         $file = image($request->image);
         if ($file == '') {
            return redirect()->back()->with(['fail' => 'please Choose An Image 500 * 362']);
         }
         $image = 'src/images/bullding/' . $file;
      } else {
         $image = avatar();
      }
      $user = Auth::user();
      $data = [
         'name'          => $request->name,
         'price'         => $request->price,
         'rent'          => $request->rent,
         'square'        => $request->square,
         'type'          => $request->type,
         'small_dis'     => strip_tags(str_limit($request->decription, 160)),
         'meta'          => $request->meta,
         'langtuide'     => $request->langtuide,
         'latitiute'     => $request->latitiute,
         'decription'    => $request->decription,
         'rooms'         => $request->rooms,
         'place'         => $request->place,
         'image'         => $image,
         'month'         => date('m'),
         'year'         => date('Y'),
         'user_id'       => $user->id,
      ];
      $bullding->create($data);

      return view('website.usersBullding.done');

   }

   /**
   * get the users bullding
   *
   * @return view
   */
   public function usersBullding()
   {
      $bulldingAll = Auth::user()->buldings()->orderBy('id', 'DESC')->paginate(6, ['*'], 'bullding');
      return view('website.usersBullding.showUsersBulding', compact('bulldingAll'));
   }

   /**
   * get the users bullding
   *
   * @return view
   */
   public function usersApprovedBullding()
   {
      $bulldingAll = Auth::user()->buldings()->where('status', 1)->orderBy('id', 'DESC')->paginate(6, ['*'], 'bullding');
      return view('website.usersBullding.showUsersBulding', compact('bulldingAll'));
   }

   /**
   * get the users bullding
   *
   * @return view
   */
   public function usersUnApprovedBullding()
   {
      $bulldingAll = Auth::user()->buldings()->where('status', 0)->orderBy('id', 'DESC')->paginate(6, ['*'], 'bullding');
      return view('website.usersBullding.showUsersBulding', compact('bulldingAll'));
   }

   /**
   * get the users bullding edit view
   *
   * @return view
   */
   public function usersEditUnApprovedBullding($id, Bullding $bullding)
   {
      // get the user
      $user = Auth::user();
      // find the bullding by id
      $bulldingInfo = $bullding->findOrFail($id);
      if ($user->id !== $bulldingInfo->user_id) {
         $messageTitle = 'UnAuthrized';
         $messageBody = "You Are UnAuthrized To Access To the Bullding $bulldingInfo->name";
         return view('website.bullding.noPermation', compact('bulldingInfo', 'messageTitle', 'messageBody'));
      } elseif ($bulldingInfo->status == 1) {
         $messageTitle = 'Alreay Published';
         $messageBody = "This Bullding $bulldingInfo->name Aready Published And You Can't Edit It Now If You Want To Edit It Please Go To Contact Us Page And Contact With us";
         return view('website.bullding.noPermation', compact('bulldingInfo', 'messageTitle', 'messageBody'));

      }

      return view('website.usersBullding.userEdit', compact('bulldingInfo', 'user'));
   }

   /**
   * update the users bullding
   *
   * @return view
   */
   public function usersUpdateUnApprovedBullding(BulldingRequest $request, Bullding $bullding)
   {
      // find the bullding by id
      $bulldingInfo = $bullding->findOrFail($request->id);
      // fill except the image
      $bulldingInfo->fill(array_except($request->all(), 'image'))->save();
      // check if there is an image request
      if ($request->file('image')) {
         $file = image($request->image, false, $bulldingInfo->image);
         if ($file == '') {
            return redirect()->back()->with(['fail' => 'please Choose An Image 1440 * 1920']);
         }
         $bulldingInfo->fill(['image' => 'src/images/bullding/' . $file])->save();
      }
      return redirect()->back()->withSuccess('the bullding updated successfully');
   }
   /**
   * update the status of bullding
   *
   * @return view
   */
   public function changeStatus($id, $status, Bullding $bullding)
   {
      // find the bullding by id
      $bulldingInfo = $bullding->findOrFail($id);
      // fill except the image
      $bulldingInfo->fill(['status' => $status])->save();
      return redirect()->back()->withSuccess('the bullding Changed Its status successfully');
   }
}
