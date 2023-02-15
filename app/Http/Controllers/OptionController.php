<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTimeZone;
use App\Models\Option;

class OptionController extends Controller {
	/**
	 * * INDEX
	 * 
	 * Returns the edit view
	 *
	 * @return void
	 */
	public function index($slug = 'general') {
		$options = Option::getDefinedOptions();

		// Build tabs
		foreach ($options as $key => $option) {
			$tabs[] = [
				'expanded' => ($key == $slug) ? 'true' : 'false',
				'href' => route('admin.options.index', ['slug' => $key]),
				'label' => $option['title'],
			];
		}

		return view('admin.options.index', [
			'icon' => $options[$slug]['icon'],
			'title' => $options[$slug]['title'],
			'subtext' => $options[$slug]['desc'],
			'slug' => $slug,
			'tabs' => $tabs,
			'fields' => $options[$slug]['fields'],
		]);
	}


	/**
	 * * UPDATE
	 * 
	 * Update record in DB
	 *
	 * @param  Request $request
	 * @return void
	 */
	public function update(Request $request, $slug = 'general') {
		$rules = Option::getValidationRules($slug);
		$request->validate(
			$rules
		);

		// Update record on passed validation
		$options = Option::getDefinedOptions($slug);
		foreach ($options['fields'] as $field) {
			if ($request->input($field['name'])) {
				Option::set($field['name'], $request->input($field['name']), $field['type']);
			}
		}

		$message = "Options have been updated.";

		// Redirect user to new content edit view
		return back()->with('message', $message);
	}
}
