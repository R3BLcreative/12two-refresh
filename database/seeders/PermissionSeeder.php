<?php

namespace Database\Seeders;

use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// Reset cached roles and permissions
		app()[PermissionRegistrar::class]->forgetCachedPermissions();

		// BACKEND PERMISSIONS
		Permission::create(['name' => 'manage backend']);
		Permission::create(['name' => 'manage content']);
		Permission::create(['name' => 'edit content']);

		// FRONTEND PERMISSIONS
		Permission::create(['name' => 'manage account']);

		// BACKEND ROLES
		$super = Role::create(['name' => 'super']); // gets all permissions via Gate::before rule; see AuthServiceProvider
		$admin = Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
		$editor = Role::create(['name' => 'editor'])->givePermissionTo([
			'manage content',
			'edit content',
			'manage account'
		]);
		$writer = Role::create(['name' => 'writer'])->givePermissionTo([
			'edit content',
			'manage account'
		]);

		// FRONTEND ROLES
		$default = Role::create(['name' => 'user'])->givePermissionTo(['manage account']);

		// Create super user
		$user = \App\Models\User::factory()->create([
			'name' => env('SEEDER_USER_NAME'),
			'email' => env('SEEDER_USER_EMAIL'),
			'password' => Hash::make(env('SEEDER_USER_PASSWORD'))
		]);
		$user->assignRole($super);

		// Create demo users
		$user = \App\Models\User::factory()->create([
			'name' => 'Admin User',
			'email' => 'admin@example.com',
			'password' => Hash::make('password')
		]);
		$user->assignRole($admin);

		$user = \App\Models\User::factory()->create([
			'name' => 'Editor User',
			'email' => 'editor@example.com',
			'password' => Hash::make('password')
		]);
		$user->assignRole($editor);

		$user = \App\Models\User::factory()->create([
			'name' => 'Writer User',
			'email' => 'writer@example.com',
			'password' => Hash::make('password')
		]);
		$user->assignRole($writer);

		$user = \App\Models\User::factory()->create([
			'name' => 'Default User',
			'email' => 'default@example.com',
			'password' => Hash::make('password')
		]);
		$user->assignRole($default);
	}
}
