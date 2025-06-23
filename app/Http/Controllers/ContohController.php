<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContohController
{
    public function index()
    {
        $title = 'Contoh Halaman Blade';
        $products = ['Laptop', 'Mouse', 'Keyboard', 'Monitor'];
        // return view('contoh', ['products' => $products, 'title' => $title]);
        return view('contoh', compact('products', 'title'));
    }

    public function coba() {
        $title = 'Halaman Coba';
        $ifLogin = true;
        $products = ['Laptop', 'Mouse', 'Keyboard', 'Monitor'];
        return view('coba', compact('title', 'ifLogin', 'products'));
    }
}