<?php

namespace App\View\Components\Admin\Fields;

use Illuminate\View\Component;

class Text extends Component {
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
		public string $type = '',
		public string $tabindex = '0',
		public string $value = '',
		public string $placeholder = 'Text here',
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
		return view('components.admin.fields.text');
	}
}
