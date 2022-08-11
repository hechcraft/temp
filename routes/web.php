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

Route::get('/user/profile/{user}', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::put('/user/profile/{user}', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('/test', function () {
//    $q = new \App\Helpers\GameTracking();
//    $q = new \App\Games\RawgAPI();
//    $stray = 452638;
//    $steelrising = 462688;
//    $w = $q->gameStoreLink($steelrising);
//    dd($w);
//    foreach ($w as $item) {
//        dd($item->screenshot);
//    }
//    dd($q->gameScreenshots($stray));
    //    dd($q->gameScreenshots($stray));//
    $data = '2022-09-01,2022-10-01';
//    $data = '2022-07-01,2022-08-01';
    \App\Jobs\FetchRawg::dispatch($data);

//    dd($q->deleteGame());

//    http://temp.test/password/reset
    $cuphead = 28154;
    $fable = 471026;
    $a = \App\Models\Game::firstWhere('rawg_id', $cuphead);
//    dd($q->gameStoreLink($cuphead));
    dd($q->gameSearchById(481908));
//    dd($q->gameSearch('saints row'));
//    dd($q->gameSearch('God of war'));
});

Route::get('/auth',  function () {
    return view('auth', ['user' => Auth::user()]);
});

Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('main');
})->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/error', \App\Http\Controllers\ErrorPageController::class)->name('error');
