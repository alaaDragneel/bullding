<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\contactRequest;
use App\Contact;
use Datatables;
use Html;
class contactController extends Controller
{
   public function index()
   {
      return view('admin.contactUs.index');
   }

   public function store(contactRequest $request, Contact $contact)
   {
      $contact->create($request->all());
      return redirect()->back()->with(['success' => 'your message is send thanks for your contact']);
   }

   public function edit($id, Contact $contact)
   {
      $contactUs = $contact->findOrFail($id);
      $contactUs->fill(['view' => 1])->save();
      return view('admin.contactUs.edit', compact('contactUs'));
   }

   public function update(contactRequest $request, $id, Contact $contact)
   {
      $contactUsUpdate = $contact->findOrFail($id);
      $contactUsUpdate->fill($request->all())->save();
      return redirect()->back()->with(['success' => 'the message is updated successfully']);
   }

   public function destroy($id, Contact $contact)
   {
      $contactUsDelete = $contact->findOrFail($id)->delete();
      return redirect()->back()->with(['success' => 'the message is deleted successfully']);
   }

  public function anyData(Contact $contact)
  {
    $contacts = $contact->all();

    $data = DataTables::of($contacts)
    ->editColumn('contactName', function ($model) {
      return Html::link(''.route("admin.contacts.edit", ['id' => $model->id]).'', $model->contactName );
    })
    ->editColumn('contactType', function ($model) {
      return  '<span class="badge badge-info">'. contact()[$model->contactType] .'</span>';
    })
    ->editColumn('view', function ($model) {
      return $model->view == 0 ? '<span class="badge badge-info">'.'New Message'.'</span>' : '<span class="badge badge-info">'.'Seen'.'</span>';
    })
    ->editColumn('actions', function ($model) {
      $all = '<a href="'.route("admin.contacts.edit", ['id' => $model->id]).'" class="btn btn-info btn-block"><i class="fa fa-edit"></i> Edit</a>';
     $all .= '<a href="'. route('contact.destroy', ['id' => $model->id]) .'" class="btn btn-danger btn-block"><i class="fa fa-close"></i> Delete</a>';

      return $all;
    })
    ->make(true);
    return $data;

  }
}
