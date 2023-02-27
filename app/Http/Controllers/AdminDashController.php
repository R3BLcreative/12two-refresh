<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminDashController extends Controller {

	/**
	 * * Dashboard View
	 *
	 * @return View
	 */
	public function index() {

		return view('admin.index', [
			'head' => [
				'title' => 'Dashboard',
			],
			'page' => [
				'title' => 'Welcome back, ' . Auth::user()->name . '!',
				'subtext' => "Here's the latest details of what has happened while you were away."
			],
		]);
	}
}
