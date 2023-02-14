<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Composers\AdminRolesPermissions;
use App\Composers\AdminNavComposer;
use App\Composers\AdminCollectionComposer;
use App\Composers\AdminCategoryComposer;

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
		View::composer('sections.admin.sidebar', AdminNavComposer::class);
		View::composer('admin.collections.*', AdminCollectionComposer::class);
		View::composer('components.admin.fields.category', AdminCategoryComposer::class);
		View::composer([
			'components.admin.forms.new-user',
			'components.admin.forms.edit-user',
			'components.admin.forms.roles-permissions',
		], AdminRolesPermissions::class);


		// FRONTEND ANONYMOUS COMPONENTS
		Blade::anonymousComponentNamespace('layouts', 'layouts');
		Blade::anonymousComponentNamespace('components', 'components');
		Blade::anonymousComponentNamespace('sections', 'sections');
		Blade::anonymousComponentNamespace('forms', 'forms');
		Blade::anonymousComponentNamespace('forms.fields', 'fields');

		// BACKEND ANONYMOUS COMPONENTS
		Blade::anonymousComponentNamespace('components.admin', 'acomponents');
		Blade::anonymousComponentNamespace('sections.admin', 'asections');
		Blade::anonymousComponentNamespace('components.admin.forms', 'aforms');
		Blade::anonymousComponentNamespace('components.admin.fields', 'afields');
	}
}
