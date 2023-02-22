<?php

namespace App\Composers;

use Illuminate\View\View;

class AdminFieldTypes {
	public function __construct() {
	}

	public function compose(View $view) {
		// Get records
		$types = config('admin.field_types');

		// Create an array for use in select fields
		foreach ($types as $type) {
			$options[$type['slug']] = $type['label'];
		}

		// Add select fields options array to original config array
		asort($options);
		$types['options'] = $options;

		// Inject into view
		$view->with('fieldTypes', $types);
	}
}
