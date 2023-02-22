<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use App\Composers\AdminTimezonesList;
use App\Composers\AdminRolesPermissions;
use App\Composers\AdminNav;
use App\Composers\AdminFieldTypes;
use App\Composers\AdminCollectionMenuOptions;
use App\Composers\AdminCollectionArray;
use App\Composers\AdminCategoryDropdown;

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
		View::composer('sections.admin.sidebar', AdminNav::class);
		View::composer('admin.collections.*', AdminCollectionArray::class);
		View::composer('components.admin.fields.category', AdminCategoryDropdown::class);
		View::composer([
			'components.admin.forms.new-user',
			'components.admin.forms.edit-user',
			'components.admin.forms.roles-permissions',
		], AdminRolesPermissions::class);
		View::composer('components.admin.fields.timezones', AdminTimezonesList::class);
		View::composer('components.admin.fields.menu-builder-list', AdminCollectionMenuOptions::class);
		View::composer('components.admin.fields.form-builder-list', AdminFieldTypes::class);


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
