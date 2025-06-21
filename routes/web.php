<?php

use Illuminate\Support\Facades\Route;

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