<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ErrorPageController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameSearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TrackedGamesController;
use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [SearchController::class, 'index'])->name('main');
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/game-search', [GameSearchController::class, 'index'])->name('game.search');

Route::get('/game/{slug}', [GameController::class, 'show']);


Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {
    Route::post('/game-search', [GameSearchController::class, 'store'])->name('game.search.save');
    Route::delete('/game-search', [GameSearchController::class, 'destroy'])->name('game.search.delete');

    Route::get('/user/profile/{user}', [ProfileController::class, 'index'])->name('profile');
    Route::put('/user/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/user/tracked-games', [TrackedGamesController::class, 'index'])->name('tracked.games');
    Route::delete('/user/tracked-games/{tracking}', [TrackedGamesController::class, 'delete'])->name('tracked.games.delete');
});

Auth::routes();

Route::get('/logout', LogoutController::class)->name('logout');

Route::get('/error', ErrorPageController::class)->name('error');

