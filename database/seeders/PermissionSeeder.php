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

		// create permissions
		Permission::create(['name' => 'manage backend']);
		Permission::create(['name' => 'manage groups']);
		Permission::create(['name' => 'manage dashboard']);

		// create roles and assign existing permissions
		$role1 = Role::create(['name' => 'super']);
		// gets all permissions via Gate::before rule; see AuthServiceProvider

		$role2 = Role::create(['name' => 'admin']);
		$role2->givePermissionTo('manage backend');
		$role2->givePermissionTo('manage groups');
		$role2->givePermissionTo('manage dashboard');

		$role3 = Role::create(['name' => 'leader']);
		$role3->givePermissionTo('manage groups');
		$role3->givePermissionTo('manage dashboard');

		$role4 = Role::create(['name' => 'user']);
		$role4->givePermissionTo('manage dashboard');

		// create super-admin & demo users
		$user = \App\Models\User::factory()->create([
			'name' => env('SEEDER_USER_NAME', 'John Doe'),
			'email' => env('SEEDER_USER_EMAIL', 'test@email.com'),
			'password' => Hash::make(env('SEEDER_USER_PASSWORD', 'password'))
		]);
		$user->assignRole($role1);

		$user = \App\Models\User::factory()->create([
			'name' => 'Admin User',
			'email' => 'admin@example.com',
			'password' => Hash::make('password')
		]);
		$user->assignRole($role2);

		$user = \App\Models\User::factory()->create([
			'name' => 'Leader User',
			'email' => 'leader@example.com',
			'password' => Hash::make('password')
		]);
		$user->assignRole($role3);

		$user = \App\Models\User::factory()->create([
			'name' => 'Basic User',
			'email' => 'user@example.com',
			'password' => Hash::make('password')
		]);
		$user->assignRole($role4);
	}
}
