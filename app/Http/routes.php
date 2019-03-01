<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', 'ShopController@index');
Route::get('/products', 'ShopController@products');
Route::get('/products/{id}', 'ShopController@product_details');
Route::get('/categories/{id}', 'ShopController@categories');
Route::get('/brands/{id}', 'ShopController@brands');

Route::get('/cart', 'CartController@index');
Route::post('/cart/add', 'CartController@addItem');
Route::post('/cart/remove/{id}', 'CartController@removeItem');

Route::get('/register', 'AccountsController@register');
Route::post('/register', 'AccountsController@create');

Route::get('/login', 'SessionController@login');
Route::post('/login', 'SessionController@create');
Route::get('/logout', 'SessionController@delete');

Route::get('/orders', 'OrdersController@index');
Route::get('/orders/checkout', 'OrdersController@checkout');
Route::get('/orders/{id}', 'OrdersController@show');
Route::post('/orders/create', 'OrdersController@create');
Route::post('/orders/shipping', 'OrdersController@addShipping');
Route::post('/orders/payment', 'OrdersController@addPayment');
Route::post('/orders/refund/{id}', 'OrdersController@refund');
