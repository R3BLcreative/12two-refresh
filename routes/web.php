<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\DonateController;

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

	Route::get('/connect', function () {
		return view('pages.connect');
	})->name('connect');
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
Route::prefix('faq')->group(function () {
	Route::get('/', function () {
		return view('pages.faq');
	})->name('faq');

	Route::get('/{cat}', function ($cat) {
		return view('pages.faq');
	})->name('faq.category');
});


// 404
Route::fallback(FallbackController::class)->name('fallback');
