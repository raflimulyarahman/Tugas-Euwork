<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContohController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index']);
Route::get('cart', [HomeController::class, 'cart']);

Route::get('/products', function () {
    return 'Ini adalah halaman produk';
});

Route::get('/checkout', function () {
    return 'Ini adalah halaman checkout';    
});

Route::get('/coba', [ContohController::class, 'coba']);

Route::get('/contoh', [ContohController::class, 'index']);
Route::resource('products', ProductController::class);