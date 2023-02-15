<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Carbon\Carbon;

class DateTimeZone extends Component {
	public Carbon $datetime;
	public mixed $format;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(Carbon $datetime, $format = NULL) {
		if (!is_null(auth()->user()->timezone)) {
			$timezone = auth()->user()->timezone;
		} else {
			$timezone = config('app.timezone');
		}

		$this->datetime = $datetime->setTimezone($timezone);
		$this->format = $format;
	}

	/**
	 * Get the default format
	 *
	 * @return void
	 */
	protected function format() {
		return $this->format ?? 'm/d/Y h:i a';
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render() {
		return $this->datetime->format($this->format);
	}
}
