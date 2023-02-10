<?php

namespace App\Composers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\CollectionType;
use App\Models\Category;

class AdminCategoryComposer {
	protected $collectionType;

	public function __construct(Request $request) {
		$collectionType = CollectionType::where('slug', $request->segment(2))->first();
		$this->collectionType = $collectionType;
	}

	public function compose(View $view) {
		// Get records
		$cats = Category::where('type', $this->collectionType->category->type)->orderBy('label', 'asc')->get();

		// Inject into view
		$view->with('cats', $cats);
	}
}
