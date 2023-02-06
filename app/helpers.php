<?php

use App\Models\Option;

/**
 * NOTE: Once you add this file to the composer.json autoload 
 * you have to run this command in the terminal (composer dump-autoload)
 */

// Get options
if (!function_exists('option')) {
	function option($key, $default = null) {
		if (is_null($key)) {
			return new Option();
		}

		if (is_array($key)) {
			return Option::set($key[0], $key[1]);
		}

		$value = Option::get($key);

		return is_null($value) ? value($default) : $value;
	}
}
