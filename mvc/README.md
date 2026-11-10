# Praktik MVC Pertama: Daftar Produk (Pertemuan 4)

Isi folder ini hanya file MVC-nya. Proyek Laravel dibuat sendiri dulu, lalu file-file di sini
disalin ke dalam proyek dengan struktur folder yang sama.

## 1. Buat proyek Laravel (database bawaan: SQLite)

    composer create-project laravel/laravel praktik-mvc
    cd praktik-mvc

Laravel versi baru memakai SQLite secara bawaan, jadi tidak perlu memasang MySQL.
File database `database/database.sqlite` dibuat otomatis saat proyek dibuat.

## 2. Buat Model + Migration, lalu Controller

    php artisan make:model Product -m
    php artisan make:controller ProductController

Perintah ini membuat file kosong. Isi masing-masing file dengan kode dari folder ini.

## 3. Salin / isi file berikut

| File di folder ini | Tujuan di proyek Laravel |
|---|---|
| `database/migrations/2026_10_30_000000_create_products_table.php` | isi ke file migration `*_create_products_table.php` yang baru dibuat (nama file bisa berbeda) |
| `app/Models/Product.php` | `app/Models/Product.php` |
| `app/Http/Controllers/ProductController.php` | `app/Http/Controllers/ProductController.php` |
| `routes/web.php` | tambahkan route `/products` ke `routes/web.php` |
| `resources/views/products/index.blade.php` | buat folder `resources/views/products/` lalu simpan di sana |
| `database/seeders/ProductSeeder.php` | `database/seeders/ProductSeeder.php` |
| `database/seeders/DatabaseSeeder.php` | `database/seeders/DatabaseSeeder.php` (menimpa file bawaan) |

Catatan: jika file migration dari `make:model -m` sudah ada, cukup salin isinya ke file tersebut.
Jangan menyimpan dua migration `create_products_table` sekaligus.

## 4. Jalankan migration dan isi data contoh

    php artisan migrate
    php artisan db:seed --class=ProductSeeder

## 5. Jalankan server

    php artisan serve

Buka http://127.0.0.1:8000/products. Akan tampil tabel 5 produk, diurutkan dari A sampai Z. Stok "Roti Bakar" adalah 0.

## Alur MVC pada contoh ini

    Browser  ->  Route (routes/web.php)
             ->  Controller (ProductController@index)
             ->  Model (Product) -> tabel products
             ->  View (products/index.blade.php)  ->  Browser

## Jika ada masalah

| Gejala | Solusi |
|---|---|
| `Base table or view not found` | Jalankan `php artisan migrate` |
| Tabel muncul tapi kosong ("Belum ada produk") | Jalankan `php artisan db:seed --class=ProductSeeder` |
| `Target class [ProductController] does not exist` | Pastikan ada `use App\Http\Controllers\ProductController;` di `routes/web.php` |
| `View [products.index] not found` | File harus bernama `resources/views/products/index.blade.php` |
| `Add [name] to fillable property` | Pastikan `$fillable` di `Product.php` berisi name, price, stock |
| Seeder dijalankan dua kali, data dobel | Jalankan `php artisan migrate:fresh --seed` untuk mengulang dari awal |

## Tantangan mandiri (opsional)

1. Tambahkan produk baru lewat `php artisan tinker`: `Product::create(['name' => 'Jus Alpukat', 'price' => 17000, 'stock' => 5]);`
2. Tampilkan tulisan "Habis" jika stok 0, memakai `@if ($product->stock > 0) ... @else ... @endif` di View.
3. Ubah urutan produk di Controller menjadi dari yang termurah (`orderBy('price')`).
