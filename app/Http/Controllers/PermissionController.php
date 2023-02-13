<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PermissionMeta;
use App\Models\Permission;

class PermissionController extends Controller {
	/**
	 * * INDEX
	 * 
	 * List permissions
	 *
	 * @return void
	 */
	public function index() {
		return view('admin.permissions.index', [
			'icon' => 'fa-key',
			'title' => 'Permissions',
			'subtext' => 'Manage roles and permissions',
			'permissions' => Permission::all(),
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
		return view('admin.permissions.create', [
			'icon' => 'fa-key',
			'title' => 'Create New Permission',
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
		// Validate
		$request->validate(
			[
				'title' => 'required|unique:permission_metas',
				'roles' => 'required',
			],
			[
				'roles.required' => 'Please select at least one role to assign this permission to.',
				'required' => 'This field is required.',
				'unique' => 'That permission title is already being used.'
			]
		);

		// Create slug from title
		$slug = Str::slug($request->title);

		// Create record
		$permission = Permission::create(['name' => $slug]);
		$meta = PermissionMeta::create([
			'title' => $request->title,
			'desc' => $request->desc,
			'permission_id' => $permission->id,
		]);

		foreach ($request->roles as $role => $null) {
			$permission->assignRole($role);
		}

		$message = "Permission has been created.";

		// Redirect user to list view
		return redirect(route('admin.permissions.index'))->with('message', $message);
	}


	/**
	 * * EDIT
	 * 
	 * Returns record edit form view
	 *
	 * @param  Permission $permission
	 * @return view
	 */
	public function edit(Permission $permission) {
		return view('admin.permissions.edit', [
			'icon' => 'fa-key',
			'title' => 'Edit Permission',
			'subtext' => '',
			'permission' => $permission,
		]);
	}


	/**
	 * * UPDATE
	 * 
	 * Update record in DB
	 *
	 * @param  Request $request
	 * @param  Permission $permission
	 * @return void
	 */
	public function update(Request $request, Permission $permission) {
		// Validate
		$request->validate(
			[
				'title' => [
					'required',
					Rule::unique('permission_metas')->ignore($permission),
				],
				'roles' => 'required',
			],
			[
				'roles.required' => 'Please select at least one role to assign this permission to.',
				'required' => 'This field is required.',
				'unique' => 'That permission title is already being used.'
			]
		);

		// Create slug from title
		$slug = Str::slug($request->title);

		// Create record
		$record = Permission::where('id', $permission->id)->update(['name' => $slug]);
		$meta = PermissionMeta::where('id', $permission->meta->id)->update([
			'title' => $request->title,
			'desc' => $request->desc,
			'permission_id' => $permission->id,
		]);

		// Build roles array for assignment
		foreach ($request->roles as $role => $null) {
			$roles[] = $role;
		}

		$permission->syncRoles($roles);

		$message = "Permission has been updated.";

		// Redirect user to list view
		return back()->with('message', $message);
	}


	/**
	 * * DESTROY
	 * 
	 * Delete record from DB
	 *
	 * @param  Permission $permission
	 * @return void
	 */
	public function destroy(Permission $permission) {
		// Check if permission can be deleted
		if (!$permission->meta->protected) {
			// Delete user
			PermissionMeta::where('id', $permission->meta->id)->delete();
			Permission::where('id', $permission->id)->delete();

			$message = "Permission has been deleted.";

			// Redirect user to list view
			return redirect(route('admin.permissions.index'))->with('message', $message);
		} else {
			return back()->with('error', "That permission is protected and it can't be deleted.");
		}
	}
}
