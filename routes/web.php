<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontProductController;
use App\Http\Controllers\CartController;

// AUTH
Auth::routes([
    'register' => false,
    'reset' => false
]);

// PRODUCTS (BACKEND)
Route::get('/backend/products','App\Http\Controllers\ProductController@products_index')->middleware('auth');
Route::get('/backend/products/create','App\Http\Controllers\ProductController@products_create')->middleware('auth');
Route::get('/backend/product/{id}/edit','App\Http\Controllers\ProductController@product_edit')->middleware('auth');
Route::post('/backend/products','App\Http\Controllers\ProductController@products_store')->middleware('auth');
Route::post('/backend/product/{id}','App\Http\Controllers\ProductController@product_update')->middleware('auth');
Route::get('/backend/products/delete/{id}','App\Http\Controllers\ProductController@delete')->middleware('auth');
Route::post('/backend/products/file/{method}','App\Http\Controllers\ProductController@file')->middleware('auth');

// COLORS (BACKEND)
Route::post('/backend/add-color/{product}', 'App\Http\Controllers\ProductController@addColor')->name('color.add')->middleware('auth');
Route::post('/backend/update-color/{color}', 'App\Http\Controllers\ProductController@updateColor')->name('color.update')->middleware('auth');
Route::post('/backend/add-color/file/{method}','App\Http\Controllers\ProductController@file')->middleware('auth');
Route::get('/backend/delete-color/{color_id}','App\Http\Controllers\ProductController@deleteColor')->middleware('auth');

// SIZES (BACKEND)
Route::post('/backend/add-size/{product}', 'App\Http\Controllers\ProductController@addSize')->name('size.add')->middleware('auth');
Route::post('/backend/update-size/{size}', 'App\Http\Controllers\ProductController@updateSize')->name('size.update')->middleware('auth');
Route::get('/backend/delete-size/{size_id}','App\Http\Controllers\ProductController@deleteSize')->middleware('auth');

Route::get('/{any}', function () {
    return view('layouts.vue');
})->where('any', '^(?!backend).*$');