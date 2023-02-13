<?php

namespace App\Composers;

use Illuminate\View\View;
use App\Models\Role;

class AdminRolesComposer {
	public function __construct() {
	}

	public function compose(View $view) {
		// Get records
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

		// Inject into view
		$view->with('roles', $return);
	}
}
