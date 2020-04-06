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

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Route::get('/player-register', function () {return view('addPlayer');})->name("playerRegister");
Route::get("/teams","TeamController@index")->name("teams");
Route::get("/teams/{id}","TeamController@viewTeam")->name("viewTeam");
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/view-player', 'HomeController@viewPlayer')->name('viewPlayer');

Route::post('payment', 'PlayerController@payment');
Route::post('payment/status', 'PlayerController@paymentCallback');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    
    Route::resource('owner', 'AdminOwnerController');
    Route::get('owner/delete/{id}', 'AdminOwnerController@delete');

    Route::resource('player', 'AdminPlayerController');
    Route::get('player/delete/{id}', 'AdminPlayerController@delete');

    Route::get("fixtures",'AdminController@generate');
});