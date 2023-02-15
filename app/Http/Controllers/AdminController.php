<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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
		return view('admin.index', ['title' => 'Dashboard']);
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

		switch ($collectionType->slug) {
			case 'collection-types':
				$items = CollectionType::orderBy('category_id', 'asc')->orderBy('order', 'asc')->get();
				break;
			case 'categories':
				$items = Category::orderBy('type', 'asc')->orderBy('order', 'asc')->get();
				break;
			default:
				$items = Collection::where('collection_type_id', $collectionType->id)->orderBy('created_at', 'asc')->get();
		}

		return view('admin.collections.index', [
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
		return view('admin.collections.create', [
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

			// Get form field id and related DB column key for DB insertion
			$insertions[$field->key] = $request->input($field->id);
		}

		// Run validations
		$request->validate($validations);

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
		return redirect(route('admin.collections.edit', [$collectionType, $new->id]))->with('message', $message);
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
			case 'collection-types':
				$item = CollectionType::where('id', $id)->first();
				$item->collectionType = CollectionType::where('slug', 'collection-types')->first();
				$item->fields = CollectionType::where('id', $id)->first();
				break;
			default:
				$item = Collection::where('id', $id)->first();
		}

		return view('admin.collections.edit', [
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
					case 'slug':
						// Figure out which table is needed to unique validate this records slug
						$table = (!in_array($collectionType->slug, ['collection-types', 'categories'])) ? 'collections' : Str::camel($collectionType->slug);

						// dd(Str::snake(Str::camel($collectionType->slug)));

						// Override all slug validations with this one
						$validations['slug'] = [
							'required',
							Rule::unique(Str::snake($table))->ignore($id),
						];

						$insertions[$field->key] = $request->input($field->id);
						break;

					default:
						$insertions[$field->key] = $request->input($field->id);
				}
			}
		}

		// Run validations
		$request->validate($validations);

		//dd($insertions);
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

		$message = $collectionType->label . " has been updated.";

		// Redirect user to new content edit view
		return redirect(route('admin.collections.edit', [$collectionType, $id]))->with('message', $message);
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

		// Check if record can be deleted
		$record = $namespace::where('id', $id)->first();

		if (!$record->protected) {
			// Delete record
			$namespace::where('id', $id)->delete();

			$message = $collectionType->label . " has been deleted.";

			// Redirect user to new content edit view
			return redirect(route('admin.collections.index', [$collectionType]))->with('message', $message);
		} else {
			return back()->with('error', "That item can't be deleted.");
		}
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
