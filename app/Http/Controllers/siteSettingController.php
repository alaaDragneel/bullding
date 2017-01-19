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
     foreach (array_except($request->toArray(), ['_token', 'submit']) as $key => $req) {
          $siteSettingUpdate = SiteSetting::where('nameSetting', $key)->get()[0];
          if ($siteSettingUpdate->type !== 3) {
             $siteSettingUpdate->fill(['value' => $req])->save();
          } else {
             $file = image($request->mainSlider);
            if ($file == '') {
               return redirect()->back()->with(['fail' => 'please Choose An Image 1440 * 1920']);
            } else {
               $siteSettingUpdate->fill(['value' => 'src/images/bullding/'.$file])->save();
            }
          }
     }
     return redirect()->back()->with(['success' => 'the data upated successfully']);
    }
}
