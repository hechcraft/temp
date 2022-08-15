<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web"middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\SearchController::class, 'index'])->name('main');
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');

Route::get('/gameSearch', [\App\Http\Controllers\GameSearchController::class, 'index'])->name('game.search');

Route::get('/game/{slug}', [\App\Http\Controllers\GameController::class, 'show']);


Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {
    Route::post('/gameSearch', [\App\Http\Controllers\GameSearchController::class, 'store'])->name('game.search.save');
    Route::delete('/gameSearch', [\App\Http\Controllers\GameSearchController::class, 'destroy'])->name('game.search.delete');
    Route::get('/user/profile/{user}', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::put('/user/profile/{user}', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/user/trackedGames', [\App\Http\Controllers\TrackedGamesController::class, 'index'])->name('tracked.games');
    Route::delete('/user/trackedGames/{tracking}', [\App\Http\Controllers\TrackedGamesController::class, 'delete'])->name('tracked.games.delete');
});

Route::get('/auth', function () {
    return view('auth', ['user' => Auth::user()]);
});

Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('main');
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/error', \App\Http\Controllers\ErrorPageController::class)->name('error');
