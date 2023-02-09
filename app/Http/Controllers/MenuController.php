<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller {
	/**
	 * * INDEX
	 * 
	 * Returns the base list view
	 *
	 * @return void
	 */
	public function index() {
		return view('admin.menus.index', ['title' => '']);
	}
}
