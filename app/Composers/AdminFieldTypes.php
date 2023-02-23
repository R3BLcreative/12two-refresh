<?php

namespace App\Composers;

use Illuminate\View\View;

class AdminFieldTypes {
	public function __construct() {
	}

	public function compose(View $view) {
		// Inject into view
		$view->with('fieldTypes', config('admin.field_types'));
	}
}
