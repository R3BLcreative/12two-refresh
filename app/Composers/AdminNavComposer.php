<?php

namespace App\Composers;

use Illuminate\View\View;
use App\Models\Category;

class AdminNavComposer {
	public function __construct() {
	}

	public function compose(View $view) {
		// Get records
		$navigation = Category::where('type', 'collection-type')->orderBy('order', 'asc')->get();

		// Inject into view
		$view->with('navigation', $navigation);
	}
}
