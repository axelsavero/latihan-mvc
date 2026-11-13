# Praktik Routing & Controller (November, Pertemuan 1)

Melanjutkan proyek `praktik-mvc` dari Pertemuan 4 Oktober. Model `Product`, migration
`products`, dan `ProductSeeder` TIDAK berubah, jadi tidak perlu dibuat ulang.
Pastikan tabel `products` sudah berisi data contoh (`php artisan db:seed --class=ProductSeeder`).

## Yang berubah / ditambah

| File di folder ini | Tujuan di proyek | Status |
|---|---|---|
| `routes/web.php` | `routes/web.php` | ganti seluruh isi file |
| `app/Http/Controllers/HomeController.php` | `app/Http/Controllers/HomeController.php` | baru |
| `app/Http/Controllers/ProductController.php` | `app/Http/Controllers/ProductController.php` | ganti seluruh isi file (index + show) |
| `resources/views/layouts/app.blade.php` | `resources/views/layouts/app.blade.php` | baru (buat folder `layouts`) |
| `resources/views/home.blade.php` | `resources/views/home.blade.php` | baru |
| `resources/views/about.blade.php` | `resources/views/about.blade.php` | baru |
| `resources/views/products/index.blade.php` | `resources/views/products/index.blade.php` | ganti seluruh isi file |
| `resources/views/products/show.blade.php` | `resources/views/products/show.blade.php` | baru |

## Langkah kerja

    php artisan make:controller HomeController     # lalu isi dengan kode di folder ini
    php artisan route:list                         # cek semua route terdaftar
    php artisan serve                              # jalankan server

Catatan: `ProductController` sudah ada dari Pertemuan 4, cukup ganti isinya.

## Skenario uji

| Alamat | Hasil yang diharapkan | Status |
|---|---|---|
| `/` | Beranda: total produk dan 3 produk terbaru | 200 |
| `/products` | 5 produk, urut A sampai Z | 200 |
| `/products?q=kopi` | Hanya "Kopi Susu" | 200 |
| `/products/1` | Detail produk dengan id 1 | 200 |
| `/products/999` | Halaman 404 bawaan Laravel | 404 |
| `/products/abc` | 404 (route hanya menerima angka) | 404 |
| `/produk` | Dialihkan ke `/products` | 302 |
| `/about` | Halaman Tentang | 200 |
| `/salam/Budi` | Teks "Halo, Budi!" | 200 |
| `/sapa` dan `/sapa/Sari` | "Halo, Tamu!" dan "Halo, Sari!" | 200 |

## Konsep yang dipakai

- `Route::get`, `Route::view`, `Route::redirect`
- Parameter route `{nama}`, `{nama?}`, dan pembatas `whereNumber()`
- Route bernama `->name()` dan pemakaian `route('nama', $parameter)` di Blade
- Group: `Route::controller()->prefix()->name()->group()`
- `Request` untuk membaca query string (`$request->query('q')`)
- Route model binding: `show(Product $product)`
- Layout Blade: `@extends`, `@section`, `@yield`

## Jika ada masalah

| Gejala | Solusi |
|---|---|
| `Route [products.show] not defined` | Nama route salah. Di dalam group, nama lengkapnya `products.show` |
| `Missing required parameter` | Tulis `route('products.show', $product)` |
| `Target class [HomeController] does not exist` | Tambahkan `use App\Http\Controllers\HomeController;` di `routes/web.php` |
| `Undefined variable $keyword` | Kirim `keyword` dari Controller (lihat `ProductController@index`) |
| `/products/abc` menghasilkan 404 | Memang disengaja karena `whereNumber('product')` |
| `View [layouts.app] not found` | File harus `resources/views/layouts/app.blade.php` |

## Tantangan mandiri (opsional)

1. Buat halaman `/contact` dengan `Route::view(...)->name('contact')`, lalu tambahkan linknya di menu `layouts/app.blade.php`.
2. Tampilkan hanya produk yang stoknya lebih dari 0 saat URL memuat `?tersedia=1`.
3. Tambah route `/products/murah` di dalam group untuk produk berharga di bawah Rp 15.000.
   Ingat: route yang lebih spesifik ditulis lebih dulu daripada `/{product}`.

## Catatan versi

`whereNumber()` tersedia mulai Laravel 10. Kode ini ditulis untuk Laravel versi baru (PHP 8.3+)
dan sudah dicek sintaks PHP-nya, tetapi belum dijalankan di proyek Laravel sungguhan.
