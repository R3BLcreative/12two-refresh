<?php

namespace Database\Seeders;

use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\RoleMeta;
use App\Models\PermissionMeta;

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
		$perm1 = Permission::create(['name' => 'manage-backend']);
		PermissionMeta::create([
			'title' => 'Manage Backend',
			'desc' => 'This permission has admin level access to the backend.',
			'protected' => true,
			'permission_id' => $perm1->id,
		]);
		$perm2 = Permission::create(['name' => 'manage-content']);
		PermissionMeta::create([
			'title' => 'Manage Content',
			'desc' => 'This permission has content management level access to the backend.',
			'protected' => true,
			'permission_id' => $perm2->id,
		]);
		$perm3 = Permission::create(['name' => 'edit-content']);
		PermissionMeta::create([
			'title' => 'Edit Content',
			'desc' => 'This permission has content creation level access to the backend.',
			'protected' => true,
			'permission_id' => $perm3->id,
		]);

		// FRONTEND PERMISSIONS
		$perm4 = Permission::create(['name' => 'manage-account']);
		PermissionMeta::create([
			'title' => 'Manage Account',
			'desc' => 'This permission has account management level access to the frontend.',
			'protected' => true,
			'permission_id' => $perm4->id,
		]);

		// BACKEND ROLES
		$super = Role::create(['name' => 'super']); // gets all permissions via Gate::before rule; see AuthServiceProvider
		RoleMeta::create([
			'title' => 'Super Admin',
			'desc' => 'This role has full access to all backend features.',
			'protected' => true,
			'role_id' => $super->id,
		]);

		$admin = Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
		RoleMeta::create([
			'title' => 'Administrator',
			'desc' => 'This role has the ability to manage non-super users, backend options, menus, categories, collection types, and collection content.',
			'protected' => true,
			'role_id' => $admin->id,
		]);

		$editor = Role::create(['name' => 'editor'])->givePermissionTo([
			'manage-content',
			'edit-content',
			'manage-account'
		]);
		RoleMeta::create([
			'title' => 'Editor',
			'desc' => 'This role has the ability to manage editor/writer users, menus, categories, and collection content.',
			'protected' => true,
			'role_id' => $editor->id,
		]);

		$writer = Role::create(['name' => 'writer'])->givePermissionTo([
			'edit-content',
			'manage-account'
		]);
		RoleMeta::create([
			'title' => 'Writer',
			'desc' => 'This role has the ability to create collection content.',
			'protected' => true,
			'role_id' => $writer->id,
		]);

		// FRONTEND ROLES
		$default = Role::create(['name' => 'user'])->givePermissionTo(['manage-account']);
		RoleMeta::create([
			'title' => 'User',
			'desc' => 'This role has access to manage their frontend dashboard account.',
			'protected' => true,
			'role_id' => $default->id,
		]);

		// Create super user
		$user = \App\Models\User::factory()->create([
			'name' => env('SEEDER_USER_NAME'),
			'email' => env('SEEDER_USER_EMAIL'),
			'password' => Hash::make(env('SEEDER_USER_PASSWORD'))
		]);
		$user->assignRole($super);

		// Create a demo user
		$user = \App\Models\User::factory()->create([
			'name' => 'Demo User',
			'email' => 'james@thecookfam.com',
			'password' => Hash::make('8aEmwbXA8eJLP99Rtrhc')
		]);
		$user->assignRole($default);
	}
}
