<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Composers\AdminNavComposer;
use App\Composers\AdminCollectionComposer;

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
		// VIEW COMPOSERS
		View::composer('sections.admin-sidebar', AdminNavComposer::class);
		View::composer('admin.*', AdminCollectionComposer::class);


		// ANONYMOUS COMPONENTS
		Blade::anonymousComponentNamespace('layouts', 'layouts');
		Blade::anonymousComponentNamespace('components', 'components');
		Blade::anonymousComponentNamespace('sections', 'sections');
		Blade::anonymousComponentNamespace('forms', 'forms');
		Blade::anonymousComponentNamespace('forms.fields', 'fields');
		Blade::anonymousComponentNamespace('components.admin-forms', 'admin-forms');
		Blade::anonymousComponentNamespace('components.admin-fields', 'admin-fields');
	}
}
