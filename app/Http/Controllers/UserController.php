<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Carbon\Carbon;
use App\Models\User;
use App\Actions\Fortify\PasswordValidationRules;

class UserController extends Controller {
	use PasswordValidationRules;

	/**
	 * * INDEX
	 * 
	 * Returns the base list view
	 *
	 * @return void
	 */
	public function index(Request $request) {
		// Get list of users based on permissions
		if (auth()->user()->hasRole('super')) {
			$users = User::get();
		} elseif (auth()->user()->can('manage-backend')) {
			$users = User::permission('manage-account')->get();
		} elseif (auth()->user()->can('manage-content')) {
			$users = User::role(['editor', 'writer'])->get();
		}

		return view('admin.users.index', [
			'head' => [
				'title' => 'Users',
			],
			'page' => [
				'icon' => 'fa-users',
				'title' => 'Users',
				'subtext' => 'Manage all application users',
			],
			'users' => $users,
		]);
	}


	/**
	 * * CREATE
	 * 
	 * Return creation form view
	 *
	 * @return view
	 */
	public function create() {
		return view('admin.users.create', [
			'head' => [
				'title' => 'Create New User',
			],
			'page' => [
				'icon' => 'fa-user-plus',
				'title' => 'Create New User',
			],
			'subtext' => '',
		]);
	}


	/**
	 * * STORE
	 * 
	 * Store new record in DB
	 *
	 * @param  Request $request
	 * @return void
	 */
	public function store(Request $request) {
		// Validate
		$request->validate(
			[
				'name' => 'required',
				'email' => 'required|email|unique:App\Models\User,email',
				'password' => $this->passwordRules(),
				'role' => 'required',
			]
		);

		// Create User
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'timezone' => $request->timezone,
		]);

		$user->assignRole($request->role);
		event(new Registered($user));

		$message = "User has been created.";

		// Redirect user to new content edit view
		return redirect(route('admin.users.index'))->with('message', $message);
	}


	/**
	 * * EDIT
	 * 
	 * Returns record edit form view
	 *
	 * @param  User $user
	 * @return view
	 */
	public function edit(User $user) {
		return view('admin.users.edit', [
			'head' => [
				'title' => 'Edit User',
			],
			'page' => [
				'icon' => 'fa-user-pen',
				'title' => 'Edit User',
				'subtext' => '',
			],
			'user' => $user,
		]);
	}


	/**
	 * * UPDATE
	 * 
	 * Update record in DB
	 *
	 * @param  Request $request
	 * @param  User    $user
	 * @return void
	 */
	public function update(Request $request, User $user) {
		$request->validate(
			[
				'name' => 'required',
				'email' => [
					'required',
					'email',
					Rule::unique('users')->ignore($user),
				],
				'role' => 'required',
			]
		);

		// Update record on passed validation
		User::where('id', $user->id)->update([
			'name' => $request->name,
			'email' => $request->email,
			'timezone' => $request->timezone,
		]);

		// Assign new role
		$user->syncRoles([$request->role]);

		$message = "User has been updated.";

		// Redirect user to new content edit view
		return redirect(route('admin.users.edit', [$user]))->with('message', $message);
	}


	/**
	 * * DESTROY
	 * 
	 * Delete record from DB
	 *
	 * @param  User $user
	 * @return void
	 */
	public function destroy(User $user) {
		// Check if user can be deleted
		$user = User::where('id', $user->id)->first();

		// Current user can not delete their own user record
		if (auth()->user()->id != $user->id) {
			// Delete user
			User::where('id', $user->id)->delete();

			$message = "User has been deleted.";

			// Redirect user to list view
			return redirect(route('admin.users.index'))->with('message', $message);
		} else {
			return back()->with('error', "You can't delete yourself.");
		}
	}
}
