<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\AddUsersAdminRequest;
use App\Http\Requests\UsersUpdateRequest;

use App\User;
use App\Bullding;
use Datatables;
use Html;
use Auth;

class UsersController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      $users = User::all();
      return view('admin.users.index', compact('users'));
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      return view('admin.users.add');
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(AddUsersAdminRequest $request)
   {

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->userType = 1;

      $user->save();

      return redirect()->route('add.user')->with(['success' => 'The User Created Successfully']);
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {

   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit($user_id)
   {
      $user = User::find($user_id);
      if(!$user){
         return redirect()->route('users')->with(['fail' => 'This User Doesn\'t Exist']);
      }
      return view('admin.users.edit', compact('user'));
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Request $request, $user_id)
   {
      $this->validate($request, [
      'name' => 'required|max:255',
      'email' => 'required|email|max:255',
      'password' => 'min:6|confirmed',
      ]);

      $user = User::find($user_id);
      $user->name !== $request->name ? $user->name = $request->name : '';
      $user->email !== $request->email ? $user->email = $request->email : '';
      $user->userType !== $request->userType ? $user->userType = $request->userType : '';
      $user->password !== bcrypt($request->password) ? $user->password = bcrypt($request->password) : '';

      $user->update();

      return redirect()->back()->with(['success' => 'The User Updated Successfully']);

   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($user_id)
   {
      $user = User::find($user_id);
      if($user->id !== 1){
         if(!$user){
            return redirect()->route('users')->with(['fail' => 'This User Doesn\'t Exist']);
         }
         $user->delete();
         Bullding::where('user_id', $user_id)->delete();
         return redirect()->route('users')->with(['success' => 'The User deleted Successfully']);
      } else {
         return redirect()->route('users')->with(['fail' => 'The Admin Can\'t be deleted']);
      }


   }

   public function anyData(User $user)
   {
      $users = $user->all();

      $data = DataTables::of($users)
      ->editColumn('name', function ($model) {
         return Html::link(''.route("edit.user", ['user_id' => $model->id]).'', $model->name );
      })
      ->editColumn('userType', function ($model) {
         return $model->userType == 0 ? '<span class="badge badge-info">'.'user'.'</span>' : '<span class="badge badge-info">'.'admin'.'</span>';
      })///admin/users/". $model->id ."/edit
      ->editColumn('actions', function ($model) {
         $all = '<a href="'.route("edit.user", ['user_id' => $model->id]).'" class="btn btn-info btn-block"><i class="fa fa-edit"></i> Edit</a>';
         if($model->id !== 1){
            $all .= '<a href="'. route('delete.user', ['user_id' => $model->id]) .'" class="btn btn-danger btn-block"><i class="fa fa-close"></i> Delete</a>';
         }
         return $all;
      })
      ->make(true);
      return $data;

   }

   public function userEditSetting()
   {
      $user = Auth::user();
      return view('website.profile.edit', compact('user'));
   }

   public function userUpdateProfile(UsersUpdateRequest $request, User $users)
   {
      $user = Auth::user();
      if ($request->email !== $user->email) {
         $checkEmail = $users->where('email', $request->email)->count();
         if ($checkEmail == 0) {
            $user->fill($request->all())->save();
         } else {
            return redirect()->back()->with(['fail' => 'This Email Already Taken']);
         }
      } else {
         $user->fill(['name' => $request->name, 'password' => bcrypt($request->password)])->save();
      }
      return redirect()->back()->with(['success' => 'YOur Data Successfully updated']);
   }
}
