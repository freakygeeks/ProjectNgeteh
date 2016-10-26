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

Route::get('/', function () {
    return view('welcome');
});

/**
Route::resource('products', 'ProductController');
Route for product
**/
Route::get('/products/create/', 'ProductController@create');
Route::get('/products', 'ProductController@index');
Route::get('/products/{products}', 'ProductController@show');
Route::post('/products', 'ProductController@store');

Route::delete('/products/{products}', 'ProductController@destroy');
Route::get('/products/{products}/edit', 'ProductController@edit');
Route::patch('/products/{products}', 'ProductController@update');

/**
Route::resource('sales', 'SaleController');
Route for sale
**/
Route::get('/sales/create', 'SaleController@create');
Route::get('/sales', 'SaleController@index');
Route::get('/sales/{sales}', 'SaleController@show');
Route::post('/sales', 'SaleController@store');

Route::delete('/sales/{sales}', 'SaleController@destroy');
Route::get('/sales/{sales}/edit', 'SaleController@edit');
Route::patch('/sales/{sales}', 'SaleController@update');


Route::get('/suppliers', 'SupplierController@index');
Route::get('/purchases', 'PurchaseController@index');