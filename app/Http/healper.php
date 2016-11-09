<?php

	function getSetting($settingName = 'siteName')
	{
		return \App\siteSetting::where('nameSetting', $settingName)->get()[0]->value;
	}
