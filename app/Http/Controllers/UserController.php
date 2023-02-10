<?php

namespace App\Http\Controllers;

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
	public function index() {
		if (auth()->user()->hasRole('super')) {
			$users = User::get();
		} elseif (auth()->user()->hasRole('admin')) {
			$users = User::permission('manage account')->get();
		} elseif (auth()->user()->hasRole('editor')) {
			$users = User::role(['editor', 'writer'])->get();
		}

		return view('admin.users.index', [
			'icon' => 'fa-users',
			'title' => 'Users',
			'subtext' => 'Manage all application users',
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
			'icon' => 'fa-user-plus',
			'title' => 'Create New User',
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
			],
			[
				'required' => 'This field is required.',
				'email.unique' => 'That email address is associated with another user.',
				'confirmed' => 'The password fields do not match.',
			]
		);

		// Create User
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'email_verified_at' => Carbon::now(),
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
			'icon' => 'fa-user-pen',
			'title' => 'Edit User',
			'subtext' => '',
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
			[],
			[
				'email.unique' => 'That email address is associated with another user.',
				'current_pass.required_with_all' => 'Your current password is needed to create a new one.',
				'current_password' => 'The password you entered does not match your current password.',
				'new_pass.required_with_all' => 'You need to enter your new password here.',
				'confirm_pass.required_with_all' => 'You need to confirm your new password here.',
				'confirm_pass.same' => 'The new and confirm password fields do not match.',
			]
		);
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
