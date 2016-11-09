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

    public function store(Request $request)
    {
	    foreach (array_except($request->toArray(), ['_token']) as $key => $req) {
	         $siteSettingUpdate = new SiteSetting();

              $siteSettingUpdate->where('nameSetting', $key)->get();

              $siteSettingUpdate->fill(['value' => $req])->update();
	    }
	    return redirect()->back()->with(['success' => 'the data upated successfully']);
    }
}
