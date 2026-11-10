<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Praktik MVC pertama: daftar produk
Route::get('/products', [ProductController::class, 'index']);
