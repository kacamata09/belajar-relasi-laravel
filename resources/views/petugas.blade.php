<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Petugas</title>
</head>
<body>

    <h2>Petugas</h2>

    <table border="1">
        <tr>
            <td>Id Petugas</td>
            <td>Nama Petugas</td>
            <td>Buku yang dipinjamkan</td>
            <td>Aksi</td>
        </tr>
        @foreach ($petugas as $p)
        <tr>
            <td>{{ $p['id'] }}</td>
            <td>{{ $p['nama_petugas'] }}</td>
            @if (!$p->bukus)
            <td>Belum ada aktivitas</td>
            @else
            <td>
            @foreach ($p->bukus as $buku)
                <li>{{ $buku }}</li>
            @endforeach
            </td>
            @endif

            <td>
                <a href="/petugas/edit/{{ $p['id'] }}">Edit</a>
                <a href="/petugas/hapus/{{ $p['id'] }}">Hapus</a>
            </td>    
        @endforeach
    </table>
    
    <br>
    <br>

    <form action="/petugas" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama Petugas</td>
                <td><input type="text" name="nama_petugas"></td>
            <tr>
        </table>
        <button type="submit">Simpan</button>
    </form>
    
</body>
</html>