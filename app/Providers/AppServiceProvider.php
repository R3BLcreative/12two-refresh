<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Composers\AdminNav;
use App\Composers\AdminCollectionArray;

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
		View::composer('components.admin.sections.sidebar', AdminNav::class);
		View::composer('admin.collections.*', AdminCollectionArray::class);


		Blade::anonymousComponentNamespace('layouts', 'layouts');

		// FRONTEND ANONYMOUS COMPONENTS
		Blade::anonymousComponentNamespace('components.frontend', 'components');
		Blade::anonymousComponentNamespace('components.frontend.sections', 'sections');
		Blade::anonymousComponentNamespace('components.frontend.forms', 'forms');
		Blade::anonymousComponentNamespace('components.frontend.fields', 'fields');

		// ADMIN ANONYMOUS COMPONENTS
		Blade::anonymousComponentNamespace('components.admin', 'acomponents');
		Blade::anonymousComponentNamespace('components.admin.sections', 'asections');
		Blade::anonymousComponentNamespace('components.admin.forms', 'aforms');
		Blade::anonymousComponentNamespace('components.admin.fields', 'afields');
	}
}
