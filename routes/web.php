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
Route::get('/backend/products','App\Http\Controllers\ProductController@products_index')->middleware('auth');
Route::get('/backend/products/create','App\Http\Controllers\ProductController@products_create')->middleware('auth');
Route::post('/backend/products','App\Http\Controllers\ProductController@products_store')->middleware('auth');
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

// PRODUCTS (FRONTEND)
Route::get('/products','App\Http\Controllers\FrontProductController@index');
Route::get('/products/{id}/{productcolor}/{productsize}/{producttype}','App\Http\Controllers\FrontProductController@show');
Route::get('/filter/color={filtercolor}&size={filtersize}&style={filterstyle}&type={filtertype}&manufacturer={filtermanufacturer}','App\Http\Controllers\FrontProductController@filterColor');

Route::get('/', function () {
    return view('welcome');
});
