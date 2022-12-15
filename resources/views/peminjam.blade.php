<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form peminjam</title>
</head>
<body>

    <h2>Peminjam</h2>

    <table border="1">
        <tr>
            <td>Tanggal Pinjam</td>
            <td>Nama Peminjam</td>
            <td>Alamat</td>
            <td>Buku Pinjaman</td>
            <td>Aksi</td>
        </tr>
        @foreach ($peminjam as $p)
        <tr>
            <td>{{ $p['updated_at'] }}</td>
            <td>{{ $p['nama_peminjam'] }}</td>
            <td>{{ $p['alamat'] }}</td>    
            <td>{{ $p->buku->nama_buku }}</td>    
            <td><a href="/peminjam/kembalikan/{{ $p['id'] }}">Kembalikan Buku</a></td>    
        @endforeach
    </table>
    
    <br>
    <br>

    <form action="/peminjam" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama Peminjam</td>
                <td><input type="text" name="nama_peminjam"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td>Buku yang dipinjam</td>

                <td>
                    <select name="buku_id">
                        @foreach ($buku as $b)

                        @if ($b['peminjam_id'] == null)
                        <option value="{{ $b['id'] }}">{{ $b['nama_buku'] }}</option>
                        @endif

                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit">Simpan</button>
    </form>

    
    <a href="/"><h3>Back to home</h3></a>
    
</body>
</html>