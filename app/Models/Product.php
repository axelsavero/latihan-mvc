<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Kolom yang boleh diisi lewat Product::create([...])
    protected $fillable = ['name', 'price', 'stock'];
}