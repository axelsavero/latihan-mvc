<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // 1. Minta data ke Model
        $products = Product::orderBy('name')->get();

        // 2. Kirim data ke View
        return view('products.index', compact('products'));
    }
}