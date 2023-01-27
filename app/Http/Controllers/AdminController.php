<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentType;

class AdminController extends Controller {

	public function index(Request $request) {
		$contentTypes = ContentType::all();
		$slug = $request->segment(2);

		// return view('admin.' . $slug, ['contentTypes' => $contentTypes]);
		return view('admin.home', ['contentTypes' => $contentTypes->toArray()]);
	}
}
