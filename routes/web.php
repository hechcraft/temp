<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\SearchController::class, 'index'])->name('main');
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');

Route::get('/gameSearch', [\App\Http\Controllers\GameSearchController::class, 'index'])->name('game.search');

Route::post('/gameSearch', [\App\Http\Controllers\GameSearchController::class, 'store'])->name('game.search.save');
Route::delete('/gameSearch', [\App\Http\Controllers\GameSearchController::class, 'destroy'])->name('game.search.delete');

Route::get('/game/{slug}', [\App\Http\Controllers\GameController::class, 'show']);

Route::get('/user/trackedGames', \App\Http\Controllers\TrackedGamesController::class)->name('tracked.games');
Route::get('/user/profile', \App\Http\Controllers\ProfileController::class)->name('profile');

Route::get('/test', function () {
    dd(config());
    \App\Jobs\FetchRawg::dispatch();

    $q = new \App\Helpers\GameTracking();
    dd($q->deleteGame());

//    http://temp.test/password/reset
    $stray = 452638;
    $cuphead = 28154;
    $fable = 471026;
    $a = \App\Models\Game::firstWhere('rawg_id', $cuphead);
    $q = new \App\Games\RawgAPI();
//    dd($q->gameStoreLink($cuphead));
    dd($q->gameSearchById(481908));
//    dd($q->gameSearch('saints row'));
//    dd($q->gameSearch('God of war'));
});
Route::view('/toggle', 'toggle');
Route::view('/game', 'gameCard');
Route::view('/auth', 'auth');

Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('main');
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/error', \App\Http\Controllers\ErrorPageController::class)->name('error');
