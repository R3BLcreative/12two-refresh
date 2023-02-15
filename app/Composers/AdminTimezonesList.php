<?php

namespace App\Composers;

use Illuminate\View\View;
use DateTimeZone;

class AdminTimezonesList {
	public function __construct() {
	}

	public function compose(View $view) {
		// Get list
		$timezones = $this->getList();

		// Inject into view
		$view->with('timezones', $timezones);
	}


	/**
	 * * GET LIST
	 * 
	 * Build list of php timezones
	 *
	 * @return Array
	 */
	private function getList() {
		$timezones = $tzs = timezone_identifiers_list(DateTimeZone::PER_COUNTRY, 'US');

		array_walk($tzs, function (&$item, $key) {
			$strings = explode('/', $item);
			$item = str_replace('_', ' ', end($strings));
		});

		return array_combine($timezones, $tzs);
	}
}
