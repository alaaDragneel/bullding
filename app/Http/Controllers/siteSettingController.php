<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SiteSetting;

class siteSettingController extends Controller
{
    public function index()
    {
	    $siteSetting = SiteSetting::all();
	    return view('admin.siteSetting.index', compact('siteSetting'));
    }

    // public function store(Request $request)
    // {
    //  foreach (array_except($request->toArray(), ['_token']) as $key) {
    //       $siteSettingUpdate = SiteSetting::where('nameSetting', $key)->get();
    //           dd($siteSettingUpdate);
    //           $siteSettingUpdate->value = $request->siteName;
    //           $siteSettingUpdate->value = $request->facebook;
    //           $siteSettingUpdate->value = $request->sitePhone;
    //           $siteSettingUpdate->value = $request->siteDesc;
    //           $siteSettingUpdate->update();
    //  }
    //  return redirect()->back()->with(['success' => 'the data upated successfully']);
    // }
}
