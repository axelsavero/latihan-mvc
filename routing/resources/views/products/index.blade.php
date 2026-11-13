@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <h1>Daftar Produk</h1>

    {{-- Form pencarian memakai method GET, jadi kata kunci muncul di URL (?q=...) --}}
    <form method="GET" action="{{ route('products.index') }}">
        <input type="text" name="q" value="{{ $keyword }}" placeholder="Cari nama produk">
        <button type="submit">Cari</button>
        @if ($keyword)
            <a href="{{ route('products.index') }}">Reset</a>
        @endif
    </form>

    @if ($keyword)
        <p class="muted">Hasil pencarian untuk: <strong>{{ $keyword }}</strong></p>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                    </td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Produk tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
