<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RoleMeta;
use App\Models\Role;
use App\Models\PermissionMeta;
use App\Models\Permission;

class RolePermissionController extends Controller {
	/**
	 * * INDEX
	 * 
	 * List permissions
	 *
	 * @return void
	 */
	public function index($slug) {
		if ($slug == 'roles') {
			$icon = 'fa-user-group-crown';
			$title = 'Roles';
			$subtext = 'Manage roles; collections of permissions.';
			$items = Role::all();
		} else {
			$icon = 'fa-key';
			$title = 'Permissions';
			$subtext = 'Manage individual permission classifications.';
			$items = Permission::all();
		}

		return view('admin.roles-permissions.index', [
			'icon' => $icon,
			'title' => $title,
			'subtext' => $subtext,
			'items' => $items,
			'slug' => $slug,
		]);
	}


	/**
	 * * CREATE
	 * 
	 * Return creation form view
	 *
	 * @return view
	 */
	public function create($slug) {
		if ($slug == 'roles') {
			$icon = 'fa-user-group-crown';
			$title = 'Create New Role';
			$subtext = '';
		} else {
			$icon = 'fa-key';
			$title = 'Create New Permission';
			$subtext = '';
		}

		return view('admin.roles-permissions.create', [
			'icon' => $icon,
			'title' => $title,
			'subtext' => $subtext,
			'slug' => $slug,
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
	public function store(Request $request, $slug) {
		// Validate
		$table = ($slug == 'roles') ? 'role_metas' : 'permission_metas';
		$request->validate(
			[
				'title' => 'required|unique:' . $table,
				'roles' => ($slug == 'permissions') ? 'required' : '',
				'permissions' => ($slug == 'roles') ? 'required' : '',
			],
			[
				'roles.required' => 'Please select at least one role to assign this permission to.',
				'permissions.required' => 'Please select at least one permission to assign to this role.',
				'required' => 'This field is required.',
				'unique' => 'That title is already being used.'
			]
		);

		// Create slug from title
		$rslug = Str::slug($request->title);

		// Create record
		if ($slug == 'roles') {
			$role = Role::create(['name' => $rslug]);
			$meta = RoleMeta::create([
				'title' => $request->title,
				'desc' => $request->desc,
				'role_id' => $role->id,
			]);

			foreach ($request->permissions as $permission => $null) {
				$role->givePermissionTo($permission);
			}

			$message = "Role has been created.";
		} else {
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
		}

		// Redirect user to list view
		return redirect(route('admin.roles-permissions.index', ['slug' => $slug]))->with('message', $message);
	}


	/**
	 * * EDIT
	 * 
	 * Returns record edit form view
	 *
	 * @param  Role|Permission $item
	 * @return view
	 */
	public function edit($slug, $item) {
		if ($slug == 'roles') {
			$icon = 'fa-user-group-crown';
			$title = 'Edit Role';
			$subtext = '';
			$item = Role::where('id', $item)->first();
		} else {
			$icon = 'fa-key';
			$title = 'Edit Permission';
			$subtext = '';
			$item = Permission::where('id', $item)->first();
		}

		return view('admin.roles-permissions.edit', [
			'icon' => $icon,
			'title' => $title,
			'subtext' => $subtext,
			'slug' => $slug,
			'item' => $item,
		]);
	}


	/**
	 * * UPDATE
	 * 
	 * Update record in DB
	 *
	 * @param  Request $request
	 * @param  Role|Permission $item
	 * @return void
	 */
	public function update(Request $request, $slug, $item) {
		// Get $item collection
		$item = ($slug == 'roles') ? Role::where('id', $item)->first() : Permission::where('id', $item)->first();

		// Validate
		$table = ($slug == 'roles') ? 'role_metas' : 'permission_metas';
		$request->validate(
			[
				'title' => [
					'required',
					Rule::unique($table)->ignore($item),
				],
				'roles' => 'sometimes|required',
				'permissions' => 'sometimes|required',
			],
			[
				'roles.required' => 'Please select at least one role to assign this permission to.',
				'permissions.required' => 'Please select at least one permission to assign to this role.',
				'required' => 'This field is required.',
				'unique' => 'That permission title is already being used.'
			]
		);

		// Create slug from title
		$rslug = Str::slug($request->title);

		// Update record
		if ($slug == 'roles') {
			$record = Role::where('id', $item->id)->update(['name' => $rslug]);
			$meta = RoleMeta::where('id', $item->meta->id)->update([
				'title' => $request->title,
				'desc' => $request->desc,
				'role_id' => $item->id,
			]);

			// Build roles array for assignment
			foreach ($request->permissions as $permission => $null) {
				$permissions[] = $permission;
			}

			$item->syncPermissions($permissions);

			$message = "Role has been updated.";
		} else {
			$record = Permission::where('id', $item->id)->update(['name' => $rslug]);
			$meta = PermissionMeta::where('id', $item->meta->id)->update([
				'title' => $request->title,
				'desc' => $request->desc,
				'permission_id' => $item->id,
			]);

			// Build roles array for assignment
			foreach ($request->roles as $role => $null) {
				$roles[] = $role;
			}

			$item->syncRoles($roles);

			$message = "Permission has been updated.";
		}

		// Redirect user to list view
		return back()->with('message', $message);
	}


	/**
	 * * DESTROY
	 * 
	 * Delete record from DB
	 *
	 * @param  Role|Permission $item
	 * @return void
	 */
	public function destroy($slug, $item) {
		// Get $item collection
		$item = ($slug == 'roles') ? Role::where('id', $item)->first() : Permission::where('id', $item)->first();

		// Check if record can be deleted
		if (!$item->meta->protected) {
			// Delete record
			if ($slug == 'roles') {
				RoleMeta::where('id', $item->meta->id)->delete();
				Role::where('id', $item->id)->delete();
			} else {
				PermissionMeta::where('id', $item->meta->id)->delete();
				Permission::where('id', $item->id)->delete();
			}

			$message = ucfirst(Str::singular($slug)) . " has been deleted.";

			// Redirect user to list view
			return redirect(route('admin.roles-permissions.index', ['slug' => $slug]))->with('message', $message);
		} else {
			return back()->with('error', "That " . Str::singular($slug) . " is protected and it can't be deleted.");
		}
	}
}
