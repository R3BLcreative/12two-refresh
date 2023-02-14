<?php

namespace App\Composers;

use Illuminate\View\View;
use App\Models\Role;
use App\Models\Permission;

class AdminRolesPermissions {
	public function __construct() {
	}

	public function compose(View $view) {
		// Get Roles
		$roles = $this->getRoles();

		// Get Permissions
		$perms = $this->getPerms();

		// Inject into view
		$view->with('roles', $roles)->with('permissions', $perms);
	}


	/**
	 * * GET ROLES
	 * 
	 * Get an array of Roles based on user permissions
	 *
	 * @return Array $roles
	 */
	private function getRoles() {
		if (auth()->user()->hasRole('super')) {
			$roles = Role::orderBy('id', 'asc')->get();
		} elseif (auth()->user()->can('manage-backend')) {
			$roles = Role::where('name', '!=', 'super')->orderBy('id', 'asc')->get();
		} elseif (auth()->user()->can('manage-content')) {
			$roles = Role::where('name', '!=', 'super')
				->where('name', '!=', 'admin')
				->where('name', '!=', 'user')
				->orderBy('id', 'asc')->get();
		}

		foreach ($roles as $role) {
			$return[$role->name] = $role->meta->title;
		}

		return $return;
	}


	/**
	 * * GET PERMS
	 * 
	 * Get an array of Permissions based on user permissions
	 *
	 * @return Array $perms
	 */
	private function getPerms() {
		if (auth()->user()->hasRole('super')) {
			$perms = Permission::orderBy('id', 'asc')->get();
		} elseif (auth()->user()->can('manage-backend')) {
			$perms = Permission::orderBy('id', 'asc')->get();
		} elseif (auth()->user()->can('manage-content')) {
			$perms = Permission::where('name', '!=', 'manage-backend')
				->where('name', '!=', 'manage-account')
				->orderBy('id', 'asc')->get();
		}

		foreach ($perms as $perm) {
			$return[$perm->name] = $perm->meta->title;
		}

		return $return;
	}
}
