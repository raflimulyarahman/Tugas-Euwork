<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContohController;

Route::get('/', function () {
    return view('Ini adalah halaman utama');
});

Route::get('/products', function () {
    return 'Ini adalah halaman produk';
});

Route::get('/cart', function () {
    return 'Ini adalah halaman keranjang belanja';
});

Route::get('/checkout', function () {
    return 'Ini adalah halaman checkout';    
});

Route::get('/contoh', [ContohController::class, 'index']);
Route::resource('products', ProductController::class);