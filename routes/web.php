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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/products', 'ProductsController@index');
Route::get('/product/{id}/show', 'ProductsController@show');
Route::get('/product/{id}/remove', 'ProductsController@remove');
Route::get('/product/{id}/edit', 'ProductsController@edit');
Route::get('/product/add', 'ProductsController@add');
Route::post('/product/store', 'ProductsController@store');
Route::post('/product/{id}/update', 'ProductsController@update');

Route::get('cart', 'CartController@index');
Route::get('cart/add/{id}', 'CartController@add');
Route::get('cart/remove/{id}', 'CartController@remove');

Route::get('orders', 'OrderController@index');
Route::get('order/create', 'OrderController@create');
Route::post('order/store', 'OrderController@store');
Route::get('order/{id}', 'OrderController@show');
