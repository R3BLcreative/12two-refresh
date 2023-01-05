<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		Blade::anonymousComponentNamespace('layouts', 'layouts');
		Blade::anonymousComponentNamespace('components', 'components');
		Blade::anonymousComponentNamespace('sections', 'sections');
		Blade::anonymousComponentNamespace('forms', 'forms');
		Blade::anonymousComponentNamespace('forms.fields', 'fields');
	}
}
