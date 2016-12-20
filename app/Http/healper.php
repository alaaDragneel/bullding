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
