<?php

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

Route::get('/', [\App\Http\Controllers\SearchController::class, 'index']);
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('/test', function () {
    //http://temp.test/password/reset
//    $q = new \App\Games\RawgAPI();
//    dd($q->gameSearch('God of war'));
    return view('auth.passwords.reset');
});
Route::view('/toggle', 'toggle');
Route::view('/game', 'gameCard');
Route::view('/auth', 'auth');

Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
