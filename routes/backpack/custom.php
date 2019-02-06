<?php

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () {
    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('user', 'UserCrudController');
    CRUD::resource('order', 'OrderCrudController');
});