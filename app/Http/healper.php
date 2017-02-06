<?php
// site setting
function getSetting($settingName = 'siteName')
{
	return \App\siteSetting::where('nameSetting', $settingName)->get()[0]->value;
}

// image avatar
function avatar()
{
   return 'src/images/bullding/avatar/avatar.jpg';
}

// the image dynamic function
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

// check image
function checkImage($bullding)
{
   return $bullding !== '' ? $bullding : avatar();
}

// the type function for bullding
function type()
{
	$array = [
		'apartment',
		'Shaleh',
		'home',
	];
	return $array;
}

// the operation type for the bullding
function rent()
{
	$array = [
		'rent',
		'own',
	];
	return $array;
}

// the status function
function status()
{
	$array = [
      'Disactive',
		'Active',
	];
	return $array;
}

// theromms function
function roomsNu()
{
   $array = [];

   for ($i=2; $i <= 40; $i++) {
      $array[$i] = $i;
   }

   return $array;
}

// the arae function
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

//the contact type
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

// the unRead message function
function unReadMessage()
{
   return \App\contact::where('view', 0)->get();
}

// the Count unRead message function
function countUnReadMessage()
{
   return \App\contact::where('view', 0)->count();
}
