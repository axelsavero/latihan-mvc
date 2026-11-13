<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Membaca ?q=... dari URL, misalnya /products?q=kopi
        $keyword = $request->query('q');

        $query = Product::orderBy('name');

        if ($keyword) {
            $query->where('name', 'like', "%{$keyword}%");
        }

        return view('products.index', [
            'products' => $query->get(),
            'keyword'  => $keyword,
        ]);
    }

    // {product} di route otomatis dicari berdasarkan id (route model binding).
    // Jika id tidak ditemukan, Laravel menampilkan halaman 404.
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
