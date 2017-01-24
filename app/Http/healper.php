<?php

function getSetting($settingName = 'siteName')
{
	return \App\siteSetting::where('nameSetting', $settingName)->get()[0]->value;
}

function avatar()
{
   return 'src/images/bullding/avatar/avatar.jpg';
}

function image($request, $slider = false, $deleteFileWithName = '', $width = '500', $height = '362')
{
   $dim = getimagesize($request);
   $extension = $request->getClientOriginalExtension();
   $sha1 = sha1($request->getClientOriginalName());
   $fileName = date("y-m-d-h-i-s") . "_" . $sha1 . "." .$extension;
   // for cover
   if ($slider === true) {
      $path = public_path('src/images/bullding/cover/');
      $request->move($path, $fileName);
      if ($deleteFileWithName != '') {
         //check if file exists
         if (file_exists($deleteFileWithName)) {
            \Illuminate\Support\Facades\File::delete($deleteFileWithName);
         }
      }
      return $fileName;
   }
   // for bullding
   $path = public_path('src/images/bullding/');
   $request->move($path, $fileName);
   if ($width == '500' && $height == '362') {
      $file = 'src/images/bullding/'. $fileName;
      \Intervention\Image\Facades\Image::make($path . $fileName)->resize('500', '362')->save($file, 100);
   }

   if ($deleteFileWithName != '') {
      //check if file exists
      if (file_exists($deleteFileWithName)) {
         if ($deleteFileWithName !== avatar()) {
            \Illuminate\Support\Facades\File::delete($deleteFileWithName);
         }
      }
   }
   return $fileName;
}

function checkImage($bullding)
{
   return $bullding !== '' ? $bullding : avatar();
}

function type()
{
	$array = [
		'apartment',
		'Shaleh',
		'home',
	];
	return $array;
}

function rent()
{
	$array = [
		'rent',
		'own',
	];
	return $array;
}


function status()
{
	$array = [
      'Disactive',
		'Active',
	];
	return $array;
}

function roomsNu()
{
   $array = [];

   for ($i=2; $i <= 40; $i++) {
      $array[$i] = $i;
   }

   return $array;
}

function place()
{
   $array = [
      'Cairo',
		'Imbaba',
		'Giza',
		'Shoubra',
		'Nasr City',
	];
	return $array;
}

function contact()
{
   $array = [
      '1' => 'Like',
		'2' => 'Suggestions',
		'3' => 'problem',
		'4' => 'More Iformation',
	];
	return $array;
}
