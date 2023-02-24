<?php

namespace App\View\Components\Admin\Fields;

use Illuminate\View\Component;
use Illuminate\Support\Str;
use DateTimeZone;
use App\Models\Role;
use App\Models\Permission;
use App\Models\CollectionType;
use App\Models\Collection;
use App\Models\Category;

class Select extends Component {
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
		public mixed $value = '',
		public string $placeholder = 'Select one...',
		public string $class = 'col-span-full',
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
		return view('components.admin.fields.select');
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
	 * * GET CATEGORIES
	 * 
	 * Get categories based on collection type
	 *
	 * @return array $options
	 */
	protected function categories() {
		// Return collectionType categories as a select options array
		return Category::where('type', $this->options->slug)->orderBy('label', 'asc')->get()->pluck('label', 'slug');
	}


	/**
	 * * GET TIMEZONES
	 * 
	 * Get timezones list
	 *
	 * @return array $options
	 */
	protected function timezones() {
		$timezones = $tzs = timezone_identifiers_list(DateTimeZone::PER_COUNTRY, 'US');

		array_walk($tzs, function (&$item, $key) {
			$strings = explode('/', $item);
			$item = str_replace('_', ' ', end($strings));
		});

		return array_combine($timezones, $tzs);
	}


	/**
	 * * GET STATES
	 * 
	 * Get states list
	 *
	 * @return array $options
	 */
	protected function states() {
		return [];
	}


	/**
	 * * GET FIELDS
	 * 
	 * Get admin fields list
	 *
	 * @return array $options
	 */
	protected function fields() {
		return config('admin.field_types');
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


	/**
	 * * GET COLLECTIONS
	 * 
	 * Get collections
	 *
	 * @return array $options
	 */
	protected function collections() {
		// Get records
		$types = CollectionType::where([
			['slug', '!=', 'collection-types'],
			['slug', '!=', 'sections'],
		])->orderBy('order', 'asc')->get();

		$ctSelect = ['custom' => 'Custom'];
		foreach ($types as $type) {
			$group = ($type->force_single) ? $type->label : Str::plural($type->label);

			if ($type->slug == 'categories') {
				$items = Category::where([
					['slug', '!=', 'settings'],
					['slug', '!=', 'collection-types'],
				])->orderBy('type', 'asc')->orderBy('order', 'asc')->get();
			} else {
				$items = Collection::where('collection_type_id', $type->id)->orderBy('title', 'asc')->get();
			}

			foreach ($items as $item) {
				$title = (property_exists($item, 'title')) ? $item->title : $item->label;
				$ctSelect[$group][$item->slug] = $title;
			}
		}

		return $ctSelect;
	}
}
