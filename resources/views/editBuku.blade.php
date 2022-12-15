<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Buku</title>
</head>
<body>

    <form action="/buku/edit/{{ $buku['id'] }}" method="post">
        @csrf
        <table>
            <tr>
                <td>Nama Buku</td>
                <td><input type="text" name="nama_buku" value="{{ $buku['nama_buku'] }}"></td>
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
                <td><input type="number" name="tahun_terbit" value="{{ $buku['tahun_terbit'] }}"></td>
            </tr>
            <tr>
                <td>Stok Buku</td>
                <td><input type="number" name="stok" value="{{ $buku['stok'] }}"></td>
            </tr>
        </table>
        <button type="submit">Simpan</button>
    </form>
    
</body>
</html>