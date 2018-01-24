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

//////FRONTEND/////
Route::get('/', [
   'uses' => 'FrontEndController@index',
   'as'   => 'index'
]);
Route::get('/single/{id}', [
    'uses' => 'FrontEndController@singleProduct',
    'as'   => 'single'
]);

//////SHOPPING/////
Route::post('/add/cart', [
    'uses' => 'ShoppingController@addCart',
    'as'   => 'add.cart'
]);
Route::get('/cart', [
    'uses' => 'ShoppingController@cart',
    'as'   => 'cart'
]);
Route::get('/delete/cart/{id}', [
    'uses' => 'ShoppingController@destroy',
    'as'   => 'delete.cart'
]);
Route::get('/cart/incr/{id}/{qty}', [
    'uses' => 'ShoppingController@incr',
    'as'   => 'cart.incr'
]);
Route::get('/cart/decr/{id}/{qty}', [
    'uses' => 'ShoppingController@decr',
    'as'   => 'cart.decr'
]);
Route::get('/cart/rapid/add/{id}', [
    'uses' => 'ShoppingController@cartRapidAdd',
    'as'   => 'cart.rapid.add'
]);

//////CHECKOUT/////
Route::get('/cart/checkout', [
    'uses' => 'CheckoutController@index',
    'as'   => 'cart.checkout'
]);
Route::post('/cart/checkout', [
    'uses' => 'CheckoutController@pay',
    'as'   => 'cart.checkout'
]);


Auth::routes();

Route::group(['middleware' => 'auth'], function (){

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'ad'   => 'home'
    ]);

    Route::get('/products', [
       'uses' => 'ProductsController@index',
       'as'   => 'products'
    ]);
    Route::get('/create/product', [
       'uses' => 'ProductsController@create',
       'as'   => 'create.product'
    ]);
    Route::post('/store/product', [
       'uses' => 'ProductsController@store',
       'as'   => 'store.product'
    ]);
    Route::get('/edit/product/{id}', [
        'uses' => 'ProductsController@edit',
        'as'   => 'edit.product'
    ]);
    Route::post('/update/product/{id}', [
        'uses' => 'ProductsController@update',
        'as'   => 'update.product'
    ]);
    Route::get('/delete/product/{id}', [
        'uses' => 'ProductsController@destroy',
        'as'   => 'delete.product'
    ]);
});
