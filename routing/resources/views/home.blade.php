@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <h1>Selamat Datang</h1>
    <p>Total produk: <strong>{{ $total }}</strong></p>

    <h2>Produk Terbaru</h2>
    <ul>
        @foreach ($latest as $product)
            <li>
                <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
            </li>
        @endforeach
    </ul>

    <p><a href="{{ route('products.index') }}">Lihat semua produk</a></p>
@endsection
