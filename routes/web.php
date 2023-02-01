<?php

use Illuminate\Support\Facades\Route;
use App\Models\ContentType;
use App\Http\Controllers\SubscribeController;
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
Route::middleware(['dashboard'])->prefix('dashboard')->group(function () {
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
	Route::middleware(['permission:manage groups'])->prefix('groups')->group(function () {
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
Route::middleware(['dashboard', 'permission:manage backend'])->prefix('admin')->group(function () {
	Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

	Route::get('/menus', [AdminController::class, 'menus'])->name('admin.menus');

	Route::get('/options', [AdminController::class, 'options'])->name('admin.options');

	Route::get('/{slug}', [AdminController::class, 'list'])->name('admin.list');

	Route::get('/{slug}/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
	Route::post('/update', [AdminController::class, 'update'])->name('admin.update');

	Route::get('/{slug}/add', [AdminController::class, 'add'])->name('admin.add');
	Route::post('/create', [AdminController::class, 'create'])->name('admin.create');
});


// 404
Route::fallback(FallbackController::class)->name('fallback');
