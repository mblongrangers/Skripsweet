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

Route::get('/about', function () {
    return view('homepage.about');
})->name('about');

Route::get('/catalogue', 'GuestController@catalogue')->name('catalogue');

Route::get('/cart', 'CartController@cart')->name('cart');

Route::get('/', function () {
    return view('homepage.home');
})->name('index');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::group(['prefix' => '{order_id}'], function() {
		Route::resource('payment', 'PaymentController');
	});
	Route::get('invoice/{id}', [
	    'as' => 'sales.unduh',
	    'use' => 'OrderController@sales'
	]);
	Route::resource('orders', 'OrdersController');
	Route::get('my-account', 'AccountController@myAccount')->name('account.my-account');
	Route::get('home', 'HomeController@index')->name('home');
	Route::resource('account', 'AccountController');
	Route::get('home', 'HomeController@index')->name('home');
	Route::get('my-account/{id?}', 'AccountController@myAccount')->name('account.my-account');
	Route::patch('updateinfo', 'AccountController@updateInfo')->name('account.updateinfo');
	Route::patch('update-account', 'AccountController@updateAccount')->name('account.update-account');
	Route::post('add-to-cart', 'CartController@addToCart')->name('add-to-cart');
	Route::post('add-address', 'AccountController@addAddress')->name('address.add');
	Route::delete('delete-address/{id}', 'AccountController@deleteAddress')->name('address.delete');
	Route::patch('update-address/{id}', 'AccountController@updateAddress')->name('address.update');
	Route::patch('update-customer', 'AccountController@updateCustomer')->name('customer.update');
	Route::put('cart/{id}/detach/{product}', 'CartController@detach')->name('cart.detach');
});

