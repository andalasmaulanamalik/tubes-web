<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Faktur Penjualan</h2>
        <p>Tanggal: {{ $tanggal }}</p>
        <p>Kasir: {{ $kasir }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>{{ $produk->nama }}</td>
            <td>{{ $produk->kategori}}</td>
            <td>{{ number_format($produk->harga, 2) }}</td>
            <td>{{ $transaksi->quantity }}</td>
            <td>{{ number_format($produk->harga * $transaksi->quantity, 2) }}</td>
        </tr>
        </tbody>
    </table>

    <div class="footer">
        <p>Terima kasih telah berbelanja!</p>
    </div>
</body>
</html>
