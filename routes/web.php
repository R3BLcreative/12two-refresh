<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\OptionController;
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
Route::prefix('12two')->group(function () {
	Route::get('/', function () {
		return view('pages.12two');
	})->name('12two');

	Route::get('/beliefs', function () {
		return view('pages.beliefs');
	})->name('beliefs');
});


// PROGRAMS
Route::prefix('programs')->group(function () {
	Route::get('/', function () {
		return view('pages.programs');
	})->name('programs');

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
Route::prefix('missions')->group(function () {
	Route::get('/', function () {
		return view('pages.missions');
	})->name('missions');

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
Route::prefix('journals')->group(function () {
	Route::get('/', function () {
		return view('pages.journals');
	})->name('journals');

	Route::get('/news', function () {
		return view('pages.news');
	})->name('news');

	Route::get('/blog', function () {
		return view('pages.blog');
	})->name('blog');

	Route::get('/trips', function () {
		return view('pages.trip-journals');
	})->name('journals.trips');
});


// BOOKING/TEACHING
Route::get('/teaching', function () {
	return view('pages.teaching');
})->name('teaching');


// DONATIONS
Route::prefix('donate')->group(function () {
	Route::get('/', function () {
		return view('pages.donate');
	})->name('donate');

	Route::get('/thanks', function () {
		return view('pages.thanks');
	})->name('thanks');

	Route::post('/', [DonateController::class, 'store'])->name('donate.store');
});


// SUBSCRIBE
Route::prefix('subscribe')->group(function () {
	Route::post('/', [SubscribeController::class, 'subscribe'])->name('subscribe.store');
});

Route::prefix('connect')->group(function () {
	// Redirect to FAQS page
	Route::get('/', function () {
		return view('pages.faqs');
	})->name('connect');

	Route::post('/', [ConnectController::class, 'store'])->name('connect.store');
});

// LEGAL
Route::get('/privacy', function () {
	return view('pages.privacy');
})->name('privacy');

Route::get('/cookies', function () {
	return view('pages.cookies');
})->name('cookies');

Route::get('/terms', function () {
	return view('pages.terms');
})->name('terms');


// FAQS
Route::prefix('faqs')->group(function () {
	Route::get('/', function () {
		return view('pages.faqs');
	})->name('faqs');

	Route::get('/{cat}', function ($cat) {
		return view('pages.faqs');
	})->name('faqs.category');
});


// DASHBOARD
Route::middleware(['account'])->prefix('dashboard')->group(function () {
	Route::get('/', function () {
		return view('user.dashboard');
	})->name('dashboard');

	// USER
	Route::get('/profile', function () {
		return view('user.profile');
	})->name('user.profile');

	Route::get('/security', function () {
		return view('user.security');
	})->name('user.security');

	Route::get('/trips', function () {
		return view('user.trips');
	})->name('user.trips');

	Route::get('/donations', function () {
		return view('user.donations');
	})->name('user.donations');

	// LEADERS
	Route::middleware(['account'])->prefix('groups')->group(function () {
		Route::get('/', function () {
			return view('user.groups');
		})->name('groups');

		Route::get('/trips', function () {
			return view('user.group-trips');
		})->name('groups.trips');

		Route::get('/participants', function () {
			return view('user.group-participants');
		})->name('groups.participants');

		Route::get('/resources', function () {
			return view('user.group-resources');
		})->name('groups.resources');
	});
});


// BACKEND
Route::middleware(['backend'])->prefix('admin')->group(function () {
	Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

	// PERMISSIONS
	Route::get('/users/permissions', [PermissionController::class, 'index'])->middleware('permission:manage-backend')->name('admin.permissions.index');
	// create
	Route::get('/users/permissions/create', [PermissionController::class, 'create'])->middleware('permission:manage-backend')->name('admin.permissions.create');
	Route::post('/users/permissions', [PermissionController::class, 'store'])->middleware('permission:manage-backend')->name('admin.permissions.store');
	// edit
	Route::get('/users/permissions/{permission:id}', [PermissionController::class, 'edit'])->middleware('permission:manage-backend')->name('admin.permissions.edit');
	Route::patch('/users/permissions/{permission:id}', [PermissionController::class, 'update'])->middleware('permission:manage-backend')->name('admin.permissions.update');
	// destroy
	Route::delete('/users/permissions/{permission:id}', [PermissionController::class, 'destroy'])->middleware('permission:manage-backend')->name('admin.permissions.destroy');

	// USERS
	Route::get('/users', [UserController::class, 'index'])->middleware('permission:manage-content')->name('admin.users.index');
	// create
	Route::get('/users/create', [UserController::class, 'create'])->middleware('permission:manage-content')->name('admin.users.create');
	Route::post('/users', [UserController::class, 'store'])->middleware('permission:manage-content')->name('admin.users.store');
	// edit
	Route::get('/users/{user:id}', [UserController::class, 'edit'])->middleware('permission:manage-content')->name('admin.users.edit');
	Route::patch('/users/{user:id}', [UserController::class, 'update'])->middleware('permission:manage-content')->name('admin.users.update');
	// destroy
	Route::delete('/users/{user:id}', [UserController::class, 'destroy'])->middleware('permission:manage-content')->name('admin.users.destroy');


	// OPTIONS
	Route::get('/options', [OptionController::class, 'index'])->middleware('permission:manage-backend')->name('admin.options.index');
	Route::put('/options', [OptionController::class, 'update'])->middleware('permission:manage-backend')->name('admin.options.update');


	// MENUS
	Route::get('/menus', [MenuController::class, 'index'])->middleware('permission:manage-content')->name('admin.menus.index');
	// create
	Route::get('/menus/create', [MenuController::class, 'create'])->middleware('permission:manage-content')->name('admin.menus.create');
	Route::post('/menus', [MenuController::class, 'store'])->middleware('permission:manage-content')->name('admin.menus.store');
	// edit
	Route::get('/menus/{menu:id}', [MenuController::class, 'edit'])->middleware('permission:manage-content')->name('admin.menus.edit');
	Route::put('/menus/{menu:id}', [MenuController::class, 'update'])->middleware('permission:manage-content')->name('admin.menus.update');
	// destroy
	Route::delete('/menus/{menu:id}', [MenuController::class, 'destroy'])->middleware('permission:manage-content')->name('admin.menus.destroy');


	// COLLECTIONS
	Route::get('/{collectionType:slug}', [AdminController::class, 'index'])->middleware('permission:manage-content')->name('admin.collections.index');
	// create
	Route::get('/{collectionType:slug}/create', [AdminController::class, 'create'])->middleware('permission:edit-content')->name('admin.collections.create');
	Route::post('/{collectionType:slug}', [AdminController::class, 'store'])->middleware('permission:edit-content')->name('admin.collections.store');
	// edit
	Route::get('/{collectionType:slug}/{id}', [AdminController::class, 'edit'])->middleware('permission:edit-content')->name('admin.collections.edit');
	Route::put('/{collectionType:slug}/{id}', [AdminController::class, 'update'])->middleware('permission:edit-content')->name('admin.collections.update');
	// destroy
	Route::delete('/{collectionType:slug}/{id}', [AdminController::class, 'destroy'])->middleware('permission:manage-content')->name('admin.collections.destroy');
});


// 404
Route::fallback(FallbackController::class)->name('fallback');
