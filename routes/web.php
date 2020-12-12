<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontProductController;
use App\Http\Controllers\CartController;

use Spatie\QueryBuilder\QueryBuilder;

// AUTH
Auth::routes([
    'register' => false,
    'reset' => false
]);

// PRODUCTS (BACKEND)
Route::resource('/backend/products', ProductController::class);
Route::get('/backend/products/delete/{id}','App\Http\Controllers\ProductController@delete')->middleware('auth');
Route::post('/backend/products/file/{method}','App\Http\Controllers\ProductController@file')->middleware('auth');

// COLORS (BACKEND)
Route::post('/backend/add-color/{product}', 'App\Http\Controllers\ProductController@addColor')->name('color.add');
Route::post('/backend/update-color/{color}', 'App\Http\Controllers\ProductController@updateColor')->name('color.update');
Route::post('/backend/add-color/file/{method}','App\Http\Controllers\ProductController@file');



// PRODUCTS (FRONTEND)
Route::resource('/products', FrontProductController::class);
Route::get('/filter/{filter}','App\Http\Controllers\FrontProductController@filterColor');

// CART
Route::get('/add-to-cart/{product}','App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/cart','App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/cart/delete/{itemId}','App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::get('/cart/update/{itemId}','App\Http\Controllers\CartController@update')->name('cart.update');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
