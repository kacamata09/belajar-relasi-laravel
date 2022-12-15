<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Buku;
use App\Models\Penerbit;

class BukuController extends Controller
{
    //
    public function simpan(Request $request) {
        $bukuBaru = $request->validate([
            'nama_buku'=>'required|min:6',
            'stok' => 'required',
            'tahun_terbit' => 'required',
            'penerbit_id' => 'required'
        ]);
        $bukuBaru['id'] = "BK" . strval(random_int(00001, 99999));
        Buku::create($bukuBaru);
        return redirect('/');
    }

    public function hapus($id) {
        $hapusBuku = Buku::find($id);
        $hapusBuku->delete();
        return redirect('/');

    }

    public function edit(Request $request, $id) {
        $bukuEdit = $request->validate([
            'nama_buku' => 'required|min:6', 
            'stok' => 'required',
            'tahun_terbit' => 'required',
            'penerbit_id' => 'required'
        ]);

        $buku = Buku::find($id);
        $buku->update($bukuEdit);
        return redirect('/');
    }

    public function editTampil($id) {
        $buku = Buku::find($id);
        return view('editBuku', ['buku' => $buku, 'penerbit' => Penerbit::all()]);
    }
}
