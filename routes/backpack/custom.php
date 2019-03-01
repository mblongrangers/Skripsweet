<?php

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () {
    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('user', 'UserCrudController');
    CRUD::resource('order', 'OrderCrudController');
    Route::resource('admin-orders', 'OrderController');
    Route::get('invoice/{id}', 'PDFController@invoice')->name('pdf.invoice');
    Route::get('delivery/{id}', 'PDFController@delivery')->name('pdf.delivery');
});

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers',
], function () {
    Route::get('invoice/{id}', 'PDFController@invoice')->name('pdf.invoice');
    Route::get('delivery/{id}', 'PDFController@delivery')->name('pdf.delivery');
    Route::get('report', 'ReportController@report')->name('report');
});