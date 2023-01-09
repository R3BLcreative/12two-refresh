<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FallbackController;

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

Route::prefix('12two')->group(function () {
	Route::get('/', function () {
		return view('pages.about');
	})->name('12two');

	Route::get('/connect', function () {
		return view('pages.connect');
	})->name('connect');
});

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

Route::prefix('journal')->group(function () {
	Route::get('/', function () {
		return view('pages.journal');
	})->name('journal');
});

// FALLBACK
Route::fallback(FallbackController::class)->name('fallback');
