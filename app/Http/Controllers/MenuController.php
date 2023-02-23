<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MenuItem;
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
			'items' => Menu::all(),
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
		// Validate request
		$request->validate(
			['title' => 'required|unique:menus']
		);

		// Create slug from title
		$slug = Str::slug($request->title);

		// Create record
		$menu = Menu::create([
			'title' => $request->title,
			'slug' => $slug,
		]);

		$message = "Menu has been created.";

		// Redirect user to list view
		return back()->with('message', $message);
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
			'title' => 'Edit: ' . $menu->title,
			'subtext' => '',
			'menu' => Menu::where('id', $menu->id)->first(),
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
		// dd($request);
		// Validate request
		$request->validate(
			[
				'title' => [
					'required',
					Rule::unique('menus')->ignore($menu),
				],
				'menu_items' => [
					'required',
					'array'
				],
				'menu_items.*.label' => 'required',
				'menu_items.*.target' => 'required',
				'menu_items.*.link' => 'required',
				'menu_items.*.url' => 'required|url',
			]
		);

		// Create slug from title
		$slug = Str::slug($request->title);

		// Update record
		$updated = Menu::where('id', $menu->id)->update([
			'title' => $request->title,
			'slug' => $slug,
		]);

		// Delete all menu items in DB with menu id
		$removed = MenuItem::where('menu_id', $menu->id)->delete();

		// Create Menu Items
		foreach ($request->menu_items as $key => $menu_item) {
			MenuItem::create([
				'order' => $key,
				'label' => $menu_item['label'],
				'link' => $menu_item['url'],
				'type' => ($menu_item['link'] == 'custom') ? 'custom' : 'collection',
				'target' => $menu_item['target'],
				'menu_id' => $menu->id,
			]);
		}

		$message = "Menu has been updated.";

		// Redirect user to list view
		return back()->with('message', $message);
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
		// Delete menu
		Menu::where('id', $menu->id)->delete();

		$message = "Menu has been deleted.";

		// Redirect user to list view
		return redirect(route('admin.menus.index'))->with('message', $message);
	}
}
