<?php

namespace App\Providers;

use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\CreateNewUser;

class FortifyServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 */
	public function register(): void {
		// Redirect backend users to backend
		$this->app->instance(LoginResponse::class, new class implements LoginResponse {
			public function toResponse($request) {
				$home = ($request->user()->can('edit content')) ? '/admin' : '/dashboard';

				return redirect()->intended($home);
			}
		});
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void {
		Fortify::createUsersUsing(CreateNewUser::class);
		Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
		Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
		Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

		RateLimiter::for('login', function (Request $request) {
			$email = (string) $request->email;

			return Limit::perMinute(5)->by($email . $request->ip());
		});

		RateLimiter::for('two-factor', function (Request $request) {
			return Limit::perMinute(5)->by($request->session()->get('login.id'));
		});

		Fortify::loginView(function () {
			return view('auth.login');
		});

		Fortify::requestPasswordResetLinkView(function () {
			return view('auth.forgot-password');
		});

		Fortify::registerView(function () {
			return view('auth.register');
		});
	}
}
