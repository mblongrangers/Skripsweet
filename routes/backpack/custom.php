<?php

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () {
    CRUD::resource('manual_invoice', 'Manual_invoiceCrudController');
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
    Route::get('report/pdf', 'ReportController@pdf')->name('report.pdf');
    Route::get('report', 'ReportController@report')->name('report');
    Route::get('manual-invoice/{manualInvoice}/product', 'ManualInvoiceController@create')->name('manual-invoice.product');
    Route::post('manual-invoice/{manualInvoice}/product', 'ManualInvoiceController@store')->name('manual-invoice.product');
    Route::put('manual-invoice/{manualInvoice}/sub', 'ManualInvoiceController@sub')->name('manual-invoice.sub');
    Route::patch('manual-invoice/{manualInvoice}/sub', 'ManualInvoiceController@sub')->name('manual-invoice.sub');
    Route::delete('manual-invoice/{manualInvoice}/trash', 'ManualInvoiceController@trash')->name('manual-invoice.trash');
    
});