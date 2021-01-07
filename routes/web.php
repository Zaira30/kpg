<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ListProducts;
use App\Http\Livewire\ListUsers;


Route::get('/', function () {
    return redirect('/login');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('products', ListProducts::class)->name('products');
    Route::get('users', ListUsers::class)->name('users');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
