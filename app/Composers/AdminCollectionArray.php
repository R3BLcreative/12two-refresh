<?php

namespace App\Composers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\CollectionType;

class AdminCollectionArray {
	protected $request;

	public function __construct(Request $request) {
		$this->request = $request;
	}

	public function compose(View $view) {
		if ($this->request->segment(2)) {
			$collectionType = CollectionType::where('slug', $this->request->segment(2))->first();

			$view->with('collectionType', $collectionType);
		}
	}
}
