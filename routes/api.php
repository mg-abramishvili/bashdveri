<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiController;

Route::get('/products','App\Http\Controllers\ApiController@products_index');
Route::get('/product/{id}','App\Http\Controllers\ApiController@product_item');
