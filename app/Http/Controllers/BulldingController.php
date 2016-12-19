<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bullding;

class BulldingController extends Controller
{
  public function index()
  {
    return view('admin.bullding.index');
  }


  public function anyData(Bullding $bullding)
  {
    $bulldings = $bullding->all();

    $data = DataTables::of($bulldings)

    ->editColumn('name', function ($model) {
      return Html::link(''.route("edit.user", ['user_id' => $model->id]).'', $model->name );
    })
    ->editColumn('type', function ($model) {
      $type = type();
      return '<span class"badge badge-info">'. $type[$model->type] .'</span>';
    })
    ->editColumn('status', function ($model) {
      return $model->type == 0 ? '<span class="badge badge-info">'.'Not Active'.'</span>' : '<span class="badge badge-info">'.'Active'.'</span>';
    })
    ->editColumn('actions', function ($model) {
      $all = '<a href="'.route("edit.bullding", ['id' => $model->id]).'" class="btn btn-info btn-block"><i class="fa fa-edit"></i> Edit</a>';
      $all .= '<a href="'. route('delete.bullding', ['id' => $model->id]) .'" class="btn btn-danger btn-block"><i class="fa fa-close"></i> Delete</a>';

      return $all;
    })
    ->make(true);
    return $data;

  }
}
