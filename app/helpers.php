<?php

use App\Models\Setting;

/**
 * NOTE: Once you add this file to the composer.json autoload 
 * you have to run this command in the terminal (composer dump-autoload)
 */

// Get settings options
if (!function_exists('setting')) {
	function setting($key, $default = null) {
		if (is_null($key)) {
			return new Setting();
		}

		if (is_array($key)) {
			return Setting::set($key[0], $key[1]);
		}

		$value = Setting::get($key);

		return is_null($value) ? value($default) : $value;
	}
}
