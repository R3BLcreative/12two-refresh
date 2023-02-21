<?php

namespace App\Composers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Models\CollectionType;
use App\Models\Collection;
use App\Models\Category;

class AdminCollectionMenuOptions {
	public function __construct() {
	}

	public function compose(View $view) {
		// Get records
		$types = CollectionType::where([
			['slug', '!=', 'collection-types'],
			['slug', '!=', 'sections'],
		])->orderBy('order', 'asc')->get();

		$ctSelect = ['custom' => 'Custom'];
		foreach ($types as $type) {
			$group = ($type->force_single) ? $type->label : Str::plural($type->label);

			if ($type->slug == 'categories') {
				$items = Category::where([
					['slug', '!=', 'settings'],
					['slug', '!=', 'collection-types'],
				])->orderBy('type', 'asc')->orderBy('order', 'asc')->get();
			} else {
				$items = Collection::where('collection_type_id', $type->id)->orderBy('title', 'asc')->get();
			}

			foreach ($items as $item) {
				$title = (property_exists($item, 'title')) ? $item->title : $item->label;
				$ctSelect[$group][$item->slug] = $title;
			}
		}

		// Inject into view
		$view->with('ctSelect', $ctSelect);
	}
}
