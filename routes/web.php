<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameSearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\TrackedGamesController;
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

Route::get('/test', function () {
//    \App\Jobs\GameNotificationTelegram::dispatch();
    \App\Jobs\FetchRawg::dispatch('2022-09-07,2022-10-07');
});

Route::get('/', [SearchController::class, 'index'])->name('main');
Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/game-search', [GameSearchController::class, 'index'])->name('game.search');

Route::get('/game/{slug}', [GameController::class, 'show']);

Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {
    Route::get('/telegram', [TelegramController::class, 'addingTelegram']);
    Route::get('/telegram/delete', [TelegramController::class, 'deleteTelegramId'])->name('delete.telegram.id');

    Route::post('/game-search', [GameSearchController::class, 'store'])->name('game.search.save');
    Route::delete('/game-search', [GameSearchController::class, 'destroy'])->name('game.search.delete');

    Route::get('/user/profile/', [ProfileController::class, 'index'])->name('profile');
    Route::put('/user/profile/', [ProfileController::class, 'update'])->name('profile.update');


    Route::get('/user/tracked-games', [TrackedGamesController::class, 'index'])->name('tracked.games');
    Route::delete('/user/tracked-games/{tracking}', [TrackedGamesController::class, 'delete'])->name('tracked.games.delete');
});

Auth::routes();

Route::get('/logout', LogoutController::class)->name('logout');
