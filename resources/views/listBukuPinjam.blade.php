<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku yang sudah dipinjam</title>
</head>
<body>
    <h2>Buku yang sudah dipinjam</h2>

    <table border="1">
        <tr>
            <td>Nama Peminjam</td>
            <td>Buku Pinjaman</td>
        </tr>
        @foreach ($peminjam as $p)
        <tr>
            <td>{{ $p['nama_peminjam'] }}</td>
            <td>{{ $p->buku->nama_buku }}</td>    
        @endforeach
    </table>

    <a href="/peminjam">Kembali ke form pinjam buku</a>
</body>
</html>