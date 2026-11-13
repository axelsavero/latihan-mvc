<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Toko Praktik')</title>
    <style>
        body   { font-family: Arial, sans-serif; margin: 0; color: #1f2933; }
        nav    { background: #0b4f6c; padding: 14px 40px; }
        nav a  { color: #fff; text-decoration: none; margin-right: 24px; font-weight: bold; }
        main   { padding: 32px 40px; }
        table  { border-collapse: collapse; width: 100%; max-width: 640px; }
        th, td { padding: 10px 14px; border-bottom: 1px solid #e1e8ea; text-align: left; }
        th     { background: #f3f7f8; }
        a      { color: #01818e; }
        .muted { color: #5c7080; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Beranda</a>
        <a href="{{ route('products.index') }}">Produk</a>
        <a href="{{ route('about') }}">Tentang</a>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>
