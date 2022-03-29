<?php

use Illuminate\Support\Facades\Route;


Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
    'password.request' => false,
    'password.reset' => false
]);
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Cashier page
Route::get('/cashier', 'HomeController@Cashier')->name('Cashier');
Route::post('/cashier' , 'HomeController@AddCashier')->name('AddCashier');

// Supplier page
Route::get('/supplier' , 'HomeController@Supplier')->name('Supplier');
Route::post('/supplier/{status}/{id}' , 'HomeController@AddSupplier')->name('AddSupplier');

// Buy Page
Route::get('/buy' , 'HomeController@Buy')->name('Buy');
Route::post('/buy/{status}/{id}' , 'HomeController@AddBuy')->name('AddBuy');

// NotLeft Page
Route::get('/notleft' , 'HomeController@notleft')->name('notleft');

// DebList Page
Route::get('/debtlist' , 'HomeController@debtlist')->name('debtlist');

// DebList Page
Route::get('/expire' , 'HomeController@expire')->name('expire');

// sellers Page
Route::get('/sellers' , 'HomeController@sellers')->name('sellers');

// sale Page
Route::get('/sale' , 'HomeController@sale')->name('sale');
Route::post('/sale' , 'HomeController@get_sale')->name('get_sale');
Route::post('/viewtb' , 'HomeController@viewtb')->name('viewtb');
Route::post('/undo' , 'HomeController@undo')->name('undo');
Route::post('/invoice' , 'HomeController@invoice')->name('invoice');
Route::get('/clean' , 'HomeController@clean')->name('clean');
