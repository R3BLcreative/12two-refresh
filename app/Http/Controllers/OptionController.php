<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;

class OptionController extends Controller {
	/**
	 * * INDEX
	 * 
	 * Returns the edit view
	 *
	 * @return void
	 */
	public function index() {
		return view('admin.options.index', [
			'icon' => 'fa-gears',
			'title' => 'Options',
			'subtext' => 'Application options and settings',
		]);
	}


	/**
	 * * UPDATE
	 * 
	 * Update record in DB
	 *
	 * @param  Request $request
	 * @param  Option  $option
	 * @return void
	 */
	public function update(Request $request, Option $option) {
		$request->validate(
			[],
			[]
		);
	}
}
