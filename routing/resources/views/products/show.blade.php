@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <h1>{{ $product->name }}</h1>

    <p>Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    <p>Stok: {{ $product->stock }}</p>

    <p><a href="{{ route('products.index') }}">&larr; Kembali ke daftar produk</a></p>
@endsection
