<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Beranda: Controller dengan satu method
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman statis: langsung ke view, tanpa Controller
Route::view('/about', 'about')->name('about');

// Redirect: alamat lama diarahkan ke alamat baru
Route::redirect('/produk', '/products');

// Kelompok route produk
Route::controller(ProductController::class)
    ->prefix('products')
    ->name('products.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{product}', 'show')->name('show')->whereNumber('product');
    });

// ---- Latihan parameter route (boleh dihapus setelah dicoba) ----

// Parameter wajib
Route::get('/salam/{nama}', fn ($nama) => "Halo, $nama!");

// Parameter opsional dengan nilai bawaan
Route::get('/sapa/{nama?}', fn ($nama = 'Tamu') => "Halo, $nama!");
