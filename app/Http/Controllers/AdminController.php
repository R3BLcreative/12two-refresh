<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Option;
use App\Models\CollectionType;
use App\Models\Collection;
use App\Models\Category;

class AdminController extends Controller {

	/**
	 * * CONSTRUCT
	 */
	public function __construct() {
	}

	/**
	 * * DASHBOARD
	 * 
	 * Render the dashboard view
	 */
	public function dashboard() {
		return view('admin.home', ['title' => 'Dashboard']);
	}


	/**
	 * * INDEX
	 * 
	 * Render the list view
	 * 
	 * @var collectionType | App\Models\CollectionType
	 */
	public function index(CollectionType $collectionType) {
		// Set page title
		$title = ($collectionType->force_single) ? $collectionType->label : Str::plural($collectionType->label);

		$items = [];

		switch ($collectionType->slug) {
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

		return view('admin.index', [
			'title' => $title,
			'items' => $items,
		]);
	}


	/**
	 * * CREATE
	 * 
	 * Render the create view
	 * 
	 * @var collectionType | App\Models\CollectionType
	 */
	public function create(CollectionType $collectionType) {
		return view('admin.create', [
			'title' => 'Create New ' . $collectionType->label,
		]);
	}


	/**
	 * * STORE
	 * 
	 * POST - Store new record
	 * 
	 * @var request | Illuminate\Http\Request
	 * @var collectionType | App\Models\CollectionType
	 */
	public function store(Request $request, CollectionType $collectionType) {
		// Loop through collectionTypeMeta fields
		$validations = [];
		$insertions = [];
		foreach ($collectionType->meta->fields as $field) {
			if (!in_array('create', $field->forms)) continue;

			// Build validation rules
			$validations[$field->id] = $field->validate->store;

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

		/** USER CREATION NEED TO HAVE ROLE ASSIGNED TO IT */

		$message = $collectionType->label . " has been created.";

		// Redirect user to new content edit view
		return redirect(route('admin.edit', [$collectionType, $new->id]))->with('message', $message);
	}


	/**
	 * * EDIT
	 * 
	 * Render the edit view
	 * 
	 * @var collectionType | App\Models\CollectionType
	 * @var id | The record ID
	 */
	public function edit(CollectionType $collectionType, $id) {
		// This needs to be dynamic
		switch ($collectionType->slug) {
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
			'title' => 'Edit ' . $collectionType->label,
			'item' => $item,
		]);
	}


	/**
	 * * UPDATE
	 * 
	 * PUT - Update record
	 * 
	 * @var request | Illuminate\Http\Request
	 * @var collectionType | App\Models\CollectionType
	 * @var id | The ID of the record to be updated
	 */
	public function update(Request $request, CollectionType $collectionType, $id) {
		// Loop through collectionTypeMeta fields
		$validations = [];
		$insertions = [];
		foreach ($collectionType->meta->fields as $field) {
			if (!in_array('edit', $field->forms)) continue;

			// Build validation rules
			$validations[$field->id] = $field->validate->update;

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
		$namespace::where('id', $id)->update($insertions);

		$message = $collectionType->label . " has been created.";

		// Redirect user to new content edit view
		return redirect(route('admin.edit', [$collectionType, $id]))->with('message', $message);
	}


	/**
	 * * DESTROY
	 * 
	 * DELETE - Destroy the record
	 * 
	 * @var collectionType | App\Models\CollectionType
	 * @var id | The record ID
	 */
	public function destroy(CollectionType $collectionType, $id) {

		$namespace = $this->getModel($collectionType->label);

		// Delete record
		$namespace::where('id', $id)->delete();

		$message = $collectionType->label . " has been deleted.";

		// Redirect user to new content edit view
		return redirect(route('admin.index', [$collectionType]))->with('message', $message);
	}







	/**
	 * * GET ALL MODELS
	 * 
	 * Get a list of all Models in App/Models directory
	 * 
	 * @var directory | a sub directory of App/Models
	 * 
	 * @return array | an array of Model class names
	 */
	private function getAllModels($directory = NULL) {
		$modelList = [];
		$path = app_path() . '/Models';
		$path .= ($directory) ? '/' . $directory : '';
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


	/**
	 * * GET MODEL
	 * 
	 * Get Model namespace for instantiation
	 * 
	 * @var model | The name of the model class to get
	 * 
	 * @return string | The full model namespace
	 */
	private function getModel($model) {
		$models = $this->getAllModels();

		// Get model dynamically via namespace
		$modelName = str_replace(' ', '', $model);
		if (in_array($modelName, $models)) {
			return "App\Models\\$modelName";
		} else {
			return "App\Models\\Collection";
		}
	}
}
