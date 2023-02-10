<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller {
	/**
	 * * INDEX
	 * 
	 * Returns the base list view
	 *
	 * @return void
	 */
	public function index() {
		return view('admin.menus.index', [
			'icon' => 'fa-list-dropdown',
			'title' => 'Menus',
			'subtext' => 'Frontend navigation structures',
		]);
	}

	/**
	 * * CREATE
	 * 
	 * Return creation form view
	 *
	 * @return view
	 */
	public function create() {
		return view('admin.menus.create', [
			'icon' => 'fa-square-plus',
			'title' => 'Create New Menu',
			'subtext' => '',
		]);
	}


	/**
	 * * STORE
	 * 
	 * Store new record in DB
	 *
	 * @param  Request $request
	 * @return void
	 */
	public function store(Request $request) {
		$request->validate(
			[],
			[]
		);
	}


	/**
	 * * EDIT
	 * 
	 * Returns record edit form view
	 *
	 * @param  Menu $menu
	 * @return view
	 */
	public function edit(Menu $menu) {
		return view('admin.menus.edit', [
			'icon' => 'fa-pen-to-square',
			'title' => 'Edit Menu',
			'subtext' => '',
		]);
	}


	/**
	 * * UPDATE
	 * 
	 * Update record in DB
	 *
	 * @param  Request $request
	 * @param  Menu  $menu
	 * @return void
	 */
	public function update(Request $request, Menu $menu) {
		$request->validate(
			[],
			[]
		);
	}


	/**
	 * * DESTROY
	 * 
	 * Delete record from DB
	 *
	 * @param  Menu $menu
	 * @return void
	 */
	public function destroy(Menu $menu) {
	}
}
