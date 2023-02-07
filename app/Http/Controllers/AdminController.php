<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Option;
use App\Models\CollectionType;
use App\Models\Collection;
use App\Models\Category;

class AdminController extends Controller {

	protected $navigation;


	//
	public function __construct() {
		$this->navigation = Category::where('type', 'collection-type')->orderBy('order', 'asc')->get();
	}


	//
	public function dashboard() {
		return view('admin.home', [
			'navigation' => $this->navigation,
			'title' => 'Dashboard',
			'desc' => '',
		]);
	}


	//
	public function menus() {
		$slug = 'menus';
		$collectionType = CollectionType::where('slug', $slug)->first();
		$items = [];

		return view('admin.menus', [
			'navigation' => $this->navigation,
			'collectionType' => $collectionType,
			'items' => $items,
			'columns' => [],
		]);
	}


	//
	public function options(Request $request) {
		$collectionType = CollectionType::where('slug', 'options')->first();
		$tab = (isset($request->tab)) ? $request->tab : 'general';
		$options = Option::getDefinedOptions();
		$tabs = [];

		// Create tabs and assign fields from config file
		foreach ($options as $key => $group) {
			$tabs[] = [
				'expanded' => ($tab == $key) ? 'true' : 'false',
				'href' => route('admin.options', ['tab' => $key]),
				'label' => $group['title'],
			];

			if ($tab == $key) $fields = $group['fields'];
		}

		// Loop through fields to set value with DB or Default
		foreach ($fields as $i => $field) {
			$fields[$i]['value'] = Option::get($field['name'], '');
		}

		return view('admin.options', [
			'navigation' => $this->navigation,
			'collectionType' => $collectionType,
			'tab' => $tab,
			'tabs' => $tabs,
			'fields' => $fields,
		]);
	}


	//
	public function options_store(Request $request) {
		$tab = (isset($request->tab)) ? $request->tab : 'general';
		$options = Option::getDefinedOptions();
		$group = $options[$tab];

		// Loop through options fields for the current tab group
		$validations = [];
		$insertions = [];
		foreach ($group['fields'] as $field) {
			// Build validation rules
			$validations[$field['name']] = $field['validate'];

			// Check if field has a name set
			if ($field['name']) {
				$insertions[$field['name']] = [
					'value' => $request->input($field['name']),
					'type' => $field['data_type'],
				];
			}
		}

		// Run validations
		$request->validate(
			$validations,
			[
				'required' => 'This field is required.',
				'integer' => 'This field must be a number.',
			]
		);

		foreach ($insertions as $key => $insertion) {
			Option::add($key, $insertion['value'], $insertion['type']);
		}

		$message = "Options have been saved.";

		// Redirect user to new content edit view
		return redirect(route('admin.options', ['tab' => $tab]))->with('message', $message);
	}


	//
	public function list($slug) {
		$collectionType = CollectionType::where('slug', $slug)->first();

		// This needs to be dynamic
		switch ($slug) {
			case 'users':
				$items = User::orderBy('id', 'asc')->get();
				break;
			case 'collection-types':
				$items = CollectionType::where('protected', false)->orderBy('category_id', 'asc')->orderBy('order', 'asc')->get();
				break;
			case 'categories':
				$items = Category::where('protected', false)->orderBy('type', 'asc')->orderBy('order', 'asc')->get();
				break;
			default:
				$items = Collection::where('collection_type_id', $collectionType->id)->orderBy('created_at', 'asc')->get();
		}

		return view('admin.list', [
			'navigation' => $this->navigation,
			'collectionType' => $collectionType,
			'items' => $items,
		]);
	}


	//
	public function edit($slug, $id) {
		// This needs to be dynamic
		switch ($slug) {
			case 'users':
				$item = User::where('id', $id)->first();
				$item->collectionType = CollectionType::where('slug', 'users')->first();
				$item->fields = User::where('id', $id)->first();
				break;
			case 'collection-types':
				$item = CollectionType::where('id', $id)->first();
				$item->collectionType = CollectionType::where('slug', 'collection-types')->first();
				$item->fields = CollectionType::where('id', $id)->first();
				break;
			default:
				$item = Collection::where('id', $id)->first();
		}

		return view('admin.edit', [
			'navigation' => $this->navigation,
			'item' => $item,
		]);
	}


	//
	public function update(Request $request) {
	}


	//
	public function add($slug) {
		$collectionType = CollectionType::where('slug', $slug)->first();

		return view('admin.add', [
			'navigation' => $this->navigation,
			'collectionType' => $collectionType,
		]);
	}


	//
	public function create(Request $request) {
		$collectionType = CollectionType::where('slug', $request->cslug)->first();

		// Loop through collectionTypeMeta fields
		$validations = [];
		$insertions = [];
		foreach ($collectionType->collectionTypeMeta->fields as $field) {
			// Build validation rules
			$validations[$field->id] = $field->validate;

			// Check if field has a key set
			if ($field->key) {
				// Get form field id and related DB column key for DB insertion
				switch ($field->key) {
					case 'password':
						$insertions['password'] = Hash::make($request->input($field->id));
						break;

					default:
						$insertions[$field->key] = $request->input($field->id);
				}
			}
		}

		// Run validations
		$request->validate(
			$validations,
			[
				'required' => 'This field is required.',
				'email.unique' => 'That email address is associated with another user.',
				'current_pass.required_with_all' => 'Your current password is needed to create a new one.',
				'current_password' => 'The password you entered does not match your current password.',
				'new_pass.required_with_all' => 'You need to enter your new password here.',
				'confirm_pass.required_with_all' => 'You need to confirm your new password here.',
				'confirm_pass.same' => 'The new and confirm password fields do not match.',
				'integer' => 'This field must be a number.',
				'slug.unique' => 'That slug is already in use.',
			]
		);

		// Get list of available app models (Models directory only)
		$models = $this->getAllModels();

		// Get model dynamically via namespace
		$modelName = str_replace(' ', '', $collectionType->label);
		if (in_array($modelName, $models)) {
			$namespace = "App\Models\\$modelName";
		} else {
			$namespace = "App\Models\\Collection";
		}

		// Create record
		$new = $namespace::create($insertions);

		$message = $collectionType->label . " has been created.";

		// Redirect user to new content edit view
		return redirect(route('admin.edit', ['slug' => $collectionType->slug, 'id' => $new->id]))->with('message', $message);
	}


	//
	public function delete($slug, $id) {
		$collectionType = CollectionType::where('slug', $slug)->first();

		$namespace = $this->getModel($collectionType->label);

		// Delete record
		$namespace::where('id', $id)->delete();

		$message = $collectionType->label . " has been deleted.";

		// Redirect user to new content edit view
		return redirect(route('admin.list', ['slug' => $collectionType->slug]))->with('message', $message);
	}


	//
	public function fieldsList($slug) {
		$collectionType = CollectionType::where('slug', $slug)->first();
		$items = $collectionType->collectionTypeMeta->fields;

		return view('admin.fields-list', [
			'navigation' => $this->navigation,
			'collectionType' => $collectionType,
			'items' => $items,
			'columns' => (object) [
				'template' => 'grid-cols-[40px_auto_150px]',
				'items' => (object) [
					(object) [
						'text' => 'Order',
						'key' => 'order',
						'type' => 'order',
						'class' => 'text-center',
					],
					(object) [
						'text' => 'Label',
						'key' => 'label',
						'type' => 'main',
						'class' => '',
					],
					(object) [
						'text' => 'Type',
						'key' => 'type',
						'type' => 'default',
						'class' => 'text-center uppercase text-sm',
					],
				]
			],
		]);
	}


	//
	public function fieldsAdd($slug) {
		$collectionType = CollectionType::where('slug', $slug)->first();

		return view('admin.fields-add', [
			'navigation' => $this->navigation,
			'collectionType' => $collectionType,
			'items' => [],
			'columns' => [],
		]);
	}


	//
	public function fieldsCreate(Request $request) {
		$collectionType = CollectionType::where('slug', $request->slug)->first();

		$message = "Field created";

		// Redirect user to new content edit view
		return redirect(route('admin.fields.list', ['slug' => $collectionType->slug]))->with('message', $message);
	}


	//
	public function fieldsEdit($slug, $name) {
		$collectionType = CollectionType::where('slug', $slug)->first();

		return view('admin.fields-edit', [
			'navigation' => $this->navigation,
			'collectionType' => $collectionType,
			'items' => [],
			'columns' => [],
		]);
	}


	//
	public function fieldsUpdate(Request $request) {
		$collectionType = CollectionType::where('slug', $request->slug)->first();

		$message = "Field updated";

		// Redirect user to new content edit view
		return redirect(route('admin.fields.list', ['slug' => $collectionType->slug]))->with('message', $message);
	}


	//
	private function getAllModels($filename = NULL) {
		$modelList = [];
		$path = app_path() . '/Models';
		$path .= ($filename) ? '/' . $filename : '';
		$results = scandir($path);

		foreach ($results as $result) {
			if ($result === '.' or $result === '..') continue;

			$filename = $result;

			if (is_dir($filename)) {
				$modelList = array_merge($modelList, $this->getAllModels($filename));
			} else {
				$modelList[] = substr($filename, 0, -4);
			}
		}

		return $modelList;
	}


	//
	private function getModel($label) {
		// Get list of available app models (Models directory only)
		$models = $this->getAllModels();

		// Get model dynamically via namespace
		$modelName = str_replace(' ', '', $label);
		if (in_array($modelName, $models)) {
			return "App\Models\\$modelName";
		} else {
			return "App\Models\\Collection";
		}
	}
}
