<?php

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
Route::get('/tutorial', function () {
    return view('homepage.tutorial');
})->name('tutorial');

Route::get('/catalogue', 'GuestController@catalogue')->name('catalogue');

Route::get('/', function () {
    return view('homepage.home');
})->name('index');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::get('my-account', 'AccountController@myAccount')->name('account.my-account');
	Route::get('home', 'HomeController@index')->name('home');
	Route::resource('account', 'AccountController');
	Route::get('home', 'HomeController@index')->name('home');
	Route::get('my-account', 'AccountController@myAccount')->name('account.my-account');
	Route::patch('updateinfo', 'AccountController@updateInfo')->name('account.updateinfo');
	Route::patch('update-account', 'AccountController@updateAccount')->name('account.update-account');
});
