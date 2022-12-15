<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko Buku</title>
</head>
<body>

    <a href="/peminjam"><h3>Form Pinjaman Buku</h3></a>
    <h1>Penerbit Buku</h1>

    <table border="1">
        <tr>
            <td>Nomor Penerbit</td>
            <td>Nama Penerbit</td>
            <td>Jumlah Buku Terbit</td>
        </tr>
        @foreach ($penerbit as $p)
        <tr>
            <td>{{ $p['id'] }}</td>
            <td>{{ $p['nama_penerbit'] }}</td>
            <td>{{ sizeOf($p->bukus) }}</td>    
        </tr>
        @endforeach
    </table>

    <br>
    <br>

    <form action="/penerbit" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama Penerbit</td>
                <td><input type="text" name="nama_penerbit"></td>
            </tr>        
        </table>
        <button type="submit">Simpan</button>
    </form>
    
    <br>
    <br>

    <h2>Buku</h2>

    <table border="1">
        <tr>
            <td>Nomor Buku</td>
            <td>Nama Buku</td>
            <td>Tahun Terbit</td>
            <td>Stok</td>
            <td>Penerbit</td>
            <td>Aksi</td>
        </tr>
        @foreach ($buku as $b)
        <tr>
            <td>{{ $b['id'] }}</td>
            <td>{{ $b['nama_buku'] }}</td>
            <td>{{ $b['tahun_terbit'] }}</td>    
            <td>{{ $b['stok'] }}</td>    
            <td>{{ $b->penerbit->nama_penerbit }}</td>    
            <td><a href="/buku/hapus/{{ $b['id'] }}">Hapus</a> 
                <a href="/buku/edit/{{ $b['id'] }}">Edit</a></td>    
                </tr>
                @endforeach
    </table>
    
    <br>
    <br>

    <form action="/buku" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama Buku</td>
                <td><input type="text" name="nama_buku"></td>
            </tr>
            <tr>
                <td>Nomor Penerbit</td>

                <td>
                    @foreach ($penerbit as $p)
                    <input type="radio" name="penerbit_id" value="{{ $p['id'] }}"> <span>{{ $p['nama_penerbit'] }}</span>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="number" name="tahun_terbit"></td>
            </tr>
            <tr>
                <td>Stok Buku</td>
                <td><input type="number" name="stok"></td>
            </tr>
        </table>
        <button type="submit">Simpan</button>
    </form>
    

    
</body>
</html>