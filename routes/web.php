<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\MenuLocationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('frontend.home');
})->name('home');


// ABOUT
Route::name('12two.')->prefix('12two')->group(function () {
	Route::get('/', function () {
		return view('frontend.12two');
	})->name('index');

	Route::get('/beliefs', function () {
		return view('frontend.beliefs');
	})->name('beliefs');
});


// PROGRAMS
Route::name('programs.')->prefix('programs')->group(function () {
	Route::get('/', function () {
		return view('frontend.programs');
	})->name('index');

	Route::get('/sports', function () {
		return view('frontend.sports');
	})->name('sports');

	Route::get('/churches', function () {
		return view('frontend.churches');
	})->name('churches');

	Route::get('/ambassadors', function () {
		return view('frontend.ambassadors');
	})->name('ambassadors');
});


// MISSIONS
Route::name('missions.')->prefix('missions')->group(function () {
	Route::get('/', function () {
		return view('frontend.missions');
	})->name('index');

	Route::get('/communities', function () {
		return view('frontend.communities');
	})->name('communities');

	Route::get('/missionaries', function () {
		return view('frontend.missionaries');
	})->name('missionaries');

	Route::get('/disaster-relief', function () {
		return view('frontend.disaster-relief');
	})->name('disaster-relief');
});


// JOURNALS
Route::name('journals.')->prefix('journals')->group(function () {
	Route::get('/', function () {
		return view('frontend.journals');
	})->name('index');

	Route::get('/news', function () {
		return view('frontend.news');
	})->name('news');

	Route::get('/blog', function () {
		return view('frontend.blog');
	})->name('blog');

	Route::get('/trips', function () {
		return view('frontend.trip-journals');
	})->name('trips');
});


// BOOKING/TEACHING
Route::get('/teaching', function () {
	return view('frontend.teaching');
})->name('teaching');


// DONATIONS
Route::name('donate.')->prefix('donate')->group(function () {
	Route::get('/', function () {
		return view('frontend.donate');
	})->name('index');

	Route::get('/thanks', function () {
		return view('frontend.thanks');
	})->name('thanks');

	Route::post('/', [DonateController::class, 'store'])->name('donate.store');
});


// SUBSCRIBE
Route::name('subscribe.')->prefix('subscribe')->group(function () {
	Route::post('/', [SubscribeController::class, 'subscribe'])->name('store');
});

// CONNECT
Route::name('connect.')->prefix('connect')->group(function () {
	// Redirect to FAQS page
	Route::get('/', function () {
		return view('frontend.faqs');
	})->name('index');

	Route::post('/', [ConnectController::class, 'store'])->name('store');
});

// LEGAL
Route::name('legal.')->prefix('legal')->group(function () {
	Route::get('/', function () {
		return view('frontend.terms');
	})->name('index');

	Route::get('/terms', function () {
		return view('frontend.terms');
	})->name('terms');

	Route::get('/privacy', function () {
		return view('frontend.privacy');
	})->name('privacy');

	Route::get('/cookies', function () {
		return view('frontend.cookies');
	})->name('cookies');
});


// FAQS
Route::name('faqs.')->prefix('faqs')->group(function () {
	Route::get('/', function () {
		return view('frontend.faqs');
	})->name('index');

	Route::get('/{cat}', function ($cat) {
		return view('frontend.faqs');
	})->name('category');
});


// DASHBOARD
Route::name('dashboard.')->prefix('dashboard')->middleware(['account'])->group(function () {
	Route::get('/', function () {
		return view('frontend.dashboard.index');
	})->name('index');

	// USER
	Route::get('/profile', function () {
		return view('frontend.dashboard.profile');
	})->name('profile');

	Route::get('/security', function () {
		return view('frontend.dashboard.security');
	})->name('security');

	Route::get('/trips', function () {
		return view('frontend.dashboard.trips');
	})->name('trips');

	Route::get('/donations', function () {
		return view('frontend.dashboard.donations');
	})->name('donations');

	// LEADERS
	Route::middleware(['account'])->name('groups')->prefix('groups')->group(function () {
		Route::get('/', function () {
			return view('frontend.dashboard.groups');
		})->name('index');

		Route::get('/trips', function () {
			return view('frontend.dashboard.group-trips');
		})->name('trips');

		Route::get('/participants', function () {
			return view('frontend.dashboard.group-participants');
		})->name('participants');

		Route::get('/resources', function () {
			return view('frontend.dashboard.group-resources');
		})->name('resources');
	});
});


// BACKEND
Route::name('admin.')->prefix('admin')->middleware('backend')->group(function () {
	Route::get('/', [AdminDashController::class, 'index'])->name('dashboard');


	// USERS
	Route::name('users.')->prefix('users')->middleware('permission:manage-content')->group(function () {
		Route::get('/', [UserController::class, 'index'])->middleware('permission:manage-content')->name('index');
		// create
		Route::get('/create', [UserController::class, 'create'])->name('create');
		Route::post('/users', [UserController::class, 'store'])->name('store');
		// edit
		Route::get('/{user:id}', [UserController::class, 'edit'])->name('edit');
		Route::patch('/{user:id}', [UserController::class, 'update'])->name('update');
		// destroy
		Route::delete('/{user:id}', [UserController::class, 'destroy'])->name('destroy');
	});


	// ROLES-PERMISSIONS
	Route::name('roles-permissions.')->prefix('roles-perms/{slug}')->middleware('permission:manage-backend')->group(function () {
		Route::get('/', [RolePermissionController::class, 'index'])->name('index');
		// create
		Route::get('/create', [RolePermissionController::class, 'create'])->name('create');
		Route::post('/', [RolePermissionController::class, 'store'])->name('store');
		// edit
		Route::get('/{item:id}', [RolePermissionController::class, 'edit'])->name('edit');
		Route::patch('/{item:id}', [RolePermissionController::class, 'update'])->name('update');
		// destroy
		Route::delete('/{item:id}', [RolePermissionController::class, 'destroy'])->name('destroy');
	})->where('slug', 'roles|permissions');


	// OPTIONS
	Route::name('options.')->prefix('options')->middleware('permission:manage-backend')->group(function () {
		Route::get('/{slug?}', [OptionController::class, 'index'])->name('index');
		Route::put('/{slug}', [OptionController::class, 'update'])->name('update');
	});


	// MENUS
	Route::name('menus.')->prefix('menus')->middleware('permission:manage-content')->group(function () {
		Route::get('/', [MenuController::class, 'index'])->name('index');
		// create
		Route::post('/', [MenuController::class, 'store'])->name('store');
		// edit
		Route::get('/{menu:id}', [MenuController::class, 'edit'])->name('edit');
		Route::put('/{menu:id}', [MenuController::class, 'update'])->name('update');
		// destroy
		Route::delete('/{menu:id}', [MenuController::class, 'destroy'])->name('destroy');
	});


	// COLLECTIONS
	Route::name('collections.')->prefix('{collectionType:slug}')->middleware('permission:edit-content')->group(function () {
		Route::get('/', [CollectionController::class, 'index'])->name('index');
		// create
		Route::get('/create', [CollectionController::class, 'create'])->name('create');
		Route::post('/', [CollectionController::class, 'store'])->name('store');
		// edit
		Route::get('/{id}', [CollectionController::class, 'edit'])->name('edit');
		Route::put('/{id}', [CollectionController::class, 'update'])->name('update');
		// form builder
		Route::get('/form/{id}', [CollectionController::class, 'edit_form'])->name('form');
		Route::put('/form/{id}', [CollectionController::class, 'update_form'])->name('form.update');
		// destroy
		Route::delete('/{id}', [CollectionController::class, 'destroy'])->name('destroy');
	});
});


// 404
Route::fallback(FallbackController::class)->name('fallback');
