<?php

namespace App\Composers;

use Illuminate\View\View;
use App\Models\CollectionType;

class AdminCollectionMenuOptions {
	public function __construct() {
	}

	public function compose(View $view) {
		// Get records
		$types = CollectionType::where([
			['slug', '!=', 'collection-types'],
			['slug', '!=', 'sections'],
		])->orderBy('order', 'asc')->get();

		// Inject into view
		$view->with('collectionTypes', $types);
	}
}
