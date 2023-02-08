<?php

namespace App\Composers;

use Illuminate\View\View;
use App\Models\Category;

class AdminNavComposer {
	public function __construct() {
	}

	public function compose(View $view) {
		// Add permissions based controls here for limiting navigation options
		$navigation = Category::where('type', 'collection-type')->orderBy('order', 'asc')->get();
		$view->with('navigation', $navigation);
	}
}
