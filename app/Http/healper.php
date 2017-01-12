<?php

function getSetting($settingName = 'siteName')
{
	return \App\siteSetting::where('nameSetting', $settingName)->get()[0]->value;
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
