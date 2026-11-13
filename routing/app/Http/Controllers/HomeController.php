<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $total  = Product::count();
        $latest = Product::latest('id')->take(3)->get();

        return view('home', compact('total', 'latest'));
    }
}
