<?php

function getSetting($settingName = 'siteName')
{
	return \App\siteSetting::where('nameSetting', $settingName)->get()[0]->value;
}

function avatar()
{
   return 'src/images/bullding/avatar/avatar.jpg';
}

function image($request, $width = '1440', $height = '1920')
{
   $dim = getimagesize($request);
   if ($dim[0] > $width || $dim[1] > $height) {
      return $fileName = '';
   }
   $extension = $request->getClientOriginalExtension();
   $sha1 = sha1($request->getClientOriginalName());
   $fileName = date("y-m-d-h-i-s") . "_" . $sha1 . "." .$extension;
   $path = public_path('src/images/bullding/');
   $request->move($path, $fileName);

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
