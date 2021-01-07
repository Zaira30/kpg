<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
    Route::get('products', 'App\Http\Controllers\Api\V1\ProductController@search');
    Route::post('product/create', 'App\Http\Controllers\Api\V1\ProductController@create');
    Route::patch('product/{id}', 'App\Http\Controllers\Api\V1\ProductController@edit');
    Route::delete('product/{id}', 'App\Http\Controllers\Api\V1\ProductController@destroy');
});

