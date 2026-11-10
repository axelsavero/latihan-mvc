<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Produk</title>
    <style>
        body   { font-family: Arial, sans-serif; margin: 40px; color: #1f2933; }
        table  { border-collapse: collapse; width: 100%; max-width: 640px; }
        th, td { padding: 10px 14px; border-bottom: 1px solid #e1e8ea; text-align: left; }
        th     { background: #f3f7f8; }
    </style>
</head>
<body>
    <h1>Daftar Produk</h1>

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
                    <td>{{ $product->name }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
