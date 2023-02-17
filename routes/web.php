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
	return view('pages.home');
})->name('home');


// ABOUT
Route::name('12two.')->prefix('12two')->group(function () {
	Route::get('/', function () {
		return view('pages.12two');
	})->name('index');

	Route::get('/beliefs', function () {
		return view('pages.beliefs');
	})->name('beliefs');
});


// PROGRAMS
Route::name('programs.')->prefix('programs')->group(function () {
	Route::get('/', function () {
		return view('pages.programs');
	})->name('index');

	Route::get('/sports', function () {
		return view('pages.sports');
	})->name('sports');

	Route::get('/churches', function () {
		return view('pages.churches');
	})->name('churches');

	Route::get('/ambassadors', function () {
		return view('pages.ambassadors');
	})->name('ambassadors');
});


// MISSIONS
Route::name('missions.')->prefix('missions')->group(function () {
	Route::get('/', function () {
		return view('pages.missions');
	})->name('index');

	Route::get('/communities', function () {
		return view('pages.communities');
	})->name('communities');

	Route::get('/missionaries', function () {
		return view('pages.missionaries');
	})->name('missionaries');

	Route::get('/disaster-relief', function () {
		return view('pages.disaster-relief');
	})->name('disaster-relief');
});


// JOURNALS
Route::name('journals.')->prefix('journals')->group(function () {
	Route::get('/', function () {
		return view('pages.journals');
	})->name('index');

	Route::get('/news', function () {
		return view('pages.news');
	})->name('news');

	Route::get('/blog', function () {
		return view('pages.blog');
	})->name('blog');

	Route::get('/trips', function () {
		return view('pages.trip-journals');
	})->name('trips');
});


// BOOKING/TEACHING
Route::get('/teaching', function () {
	return view('pages.teaching');
})->name('teaching');


// DONATIONS
Route::name('donate.')->prefix('donate')->group(function () {
	Route::get('/', function () {
		return view('pages.donate');
	})->name('index');

	Route::get('/thanks', function () {
		return view('pages.thanks');
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
		return view('pages.faqs');
	})->name('index');

	Route::post('/', [ConnectController::class, 'store'])->name('store');
});

// LEGAL
Route::name('legal.')->prefix('legal')->group(function () {
	Route::get('/', function () {
		return view('pages.terms');
	})->name('index');

	Route::get('/terms', function () {
		return view('pages.terms');
	})->name('terms');

	Route::get('/privacy', function () {
		return view('pages.privacy');
	})->name('privacy');

	Route::get('/cookies', function () {
		return view('pages.cookies');
	})->name('cookies');
});


// FAQS
Route::name('faqs.')->prefix('faqs')->group(function () {
	Route::get('/', function () {
		return view('pages.faqs');
	})->name('index');

	Route::get('/{cat}', function ($cat) {
		return view('pages.faqs');
	})->name('category');
});


// DASHBOARD
Route::name('dashboard.')->prefix('dashboard')->middleware(['account'])->group(function () {
	Route::get('/', function () {
		return view('dashboard.index');
	})->name('index');

	// USER
	Route::get('/profile', function () {
		return view('dashboard.profile');
	})->name('profile');

	Route::get('/security', function () {
		return view('dashboard.security');
	})->name('security');

	Route::get('/trips', function () {
		return view('dashboard.trips');
	})->name('trips');

	Route::get('/donations', function () {
		return view('dashboard.donations');
	})->name('donations');

	// LEADERS
	Route::middleware(['account'])->name('groups')->prefix('groups')->group(function () {
		Route::get('/', function () {
			return view('dashboard.groups');
		})->name('index');

		Route::get('/trips', function () {
			return view('dashboard.group-trips');
		})->name('trips');

		Route::get('/participants', function () {
			return view('dashboard.group-participants');
		})->name('participants');

		Route::get('/resources', function () {
			return view('dashboard.group-resources');
		})->name('resources');
	});
});


// BACKEND
Route::name('admin.')->prefix('admin')->middleware('backend')->group(function () {
	Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');


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
		Route::get('/', [AdminController::class, 'index'])->name('index');
		// create
		Route::get('/create', [AdminController::class, 'create'])->name('create');
		Route::post('/', [AdminController::class, 'store'])->name('store');
		// edit
		Route::get('/{id}', [AdminController::class, 'edit'])->name('edit');
		Route::put('/{id}', [AdminController::class, 'update'])->name('update');
		// destroy
		Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy');
	});
});


// 404
Route::fallback(FallbackController::class)->name('fallback');
