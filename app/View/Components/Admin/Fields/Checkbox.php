<?php

namespace App\View\Components\Admin\Fields;

use Illuminate\View\Component;
use App\Models\Role;
use App\Models\Permission;

class Checkbox extends Component {
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(
		public string $id,
		public string $label = '',
		public string $name = '',
		public string $desc = '',
		public bool $disabled = false,
		public bool $required = false,
		public mixed $options = [],
		public string $type = 'default',
		public string $tabindex = '0',
		public mixed $value = [],
		public string $placeholder = 'Select one...',
		public string $class = 'col-span-full',
		public string $cols = 'columns-2'
	) {
	}


	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render() {
		$this->name = (empty($this->name)) ? $this->id : $this->name;
		$this->options = $this->getOptions();
		return view('components.admin.fields.checkbox');
	}


	/**
	 * * GET OPTIONS
	 *
	 * Get select options array based on type
	 * 
	 * @return array $options
	 */
	protected function getOptions() {
		if (method_exists($this, $this->type)) {
			return $this->{$this->type}();
		} else {
			return ['0' => 'Method does not exist'];
		}
	}


	/**
	 * * GET DEFAULT
	 * 
	 * The default functionality which returns the $options
	 * array already defined in the parameter.
	 *
	 * @return void
	 */
	protected function default() {
		return (is_null($this->options)) ? [] : $this->options;
	}


	/**
	 * * GET ROLES
	 * 
	 * Get roles
	 *
	 * @return array $options
	 */
	protected function roles() {
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

		// Remove super for Permissions checkboxes
		unset($return['super']);

		return $return;
	}


	/**
	 * * GET PERMISSIONS
	 * 
	 * Get permissions
	 *
	 * @return array $options
	 */
	protected function permissions() {
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
