<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Kopi Susu',   'price' => 18000, 'stock' => 20],
            ['name' => 'Teh Tarik',   'price' => 15000, 'stock' => 12],
            ['name' => 'Roti Bakar',  'price' => 12000, 'stock' => 0],
            ['name' => 'Nasi Goreng', 'price' => 25000, 'stock' => 8],
            ['name' => 'Es Jeruk',    'price' => 10000, 'stock' => 30],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
