<?php

namespace App\Composers;

use Spatie\Permission\Models\Role;
use Illuminate\View\View;

class AdminRolesComposer {
	public function __construct() {
	}

	public function compose(View $view) {
		// Get records
		if (auth()->user()->hasRole('super')) {
			$roles = Role::orderBy('name', 'asc')->get();
		} elseif (auth()->user()->hasRole('admin')) {
			$roles = Role::where('name', '!=', 'super')->orderBy('name', 'asc')->get();
		} elseif (auth()->user()->hasRole('editor')) {
			$roles = Role::where('name', '!=', 'super')
				->where('name', '!=', 'admin')
				->where('name', '!=', 'user')
				->orderBy('name', 'asc')->get();
		}

		// Inject into view
		$view->with('roles', $roles);
	}
}
