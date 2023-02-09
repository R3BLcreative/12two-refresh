<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OptionController extends Controller {
	/**
	 * * INDEX
	 * 
	 * Returns the base list view
	 *
	 * @return void
	 */
	public function index() {
		return view('admin.options.index', ['title' => '']);
	}
}
