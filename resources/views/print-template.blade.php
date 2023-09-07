<!DOCTYPE html>
<html>
<head>
    <title>Cetak Transaksi</title>
</head>
<body>
    <h1>Transaksi pelanggan</h1>
    <p>Nomor Transaksi: {{ $transaksi->infoice_id }}</p>
    <p>Tanggal: {{ formatDate($transaksi->created_at) }}</p>
    <p>+++++++++++++++++++++++++++++++++++++++++++++</p>
    <p>Informasi Transaksi</p>
    <br>
    <p>Nama Pelanggan:{{ $transaksi->pelanggan->userpelanggan->name }}</p>
    <p>Paket yang di pilih{{ $transaksi->paket->namapaket }}</p>
    <p>Kecepatan Paket{{ $transaksi->paket->kecepatan }}</p>
    <p>Harga Paket{{ $transaksi->paket->harga }}</p>
    <br>
    <p>=============================================</p>
    <p>Total: {{ $transaksi->harga }}</p>
</body>
</html>
