<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjam;
use App\Models\Buku;

class PeminjamController extends Controller
{
    //
    public function tampil(){
        $peminjam = Peminjam::all();
        $buku = Buku::all();
        return view('peminjam', ['peminjam' => $peminjam, 'buku'=>$buku]);
        // $peminjam = Peminjam::find(2);
        // return $peminjam->buku;
    }

    public function simpan(Request $request) {
        $peminjamBaru = $request->validate([
            'nama_peminjam' => 'required|min:5',
            'alamat' => 'required',
            'buku_id' => 'required',
        ]);

        $peminjam = Peminjam::create($peminjamBaru);
        $updateBuku = Buku::find($peminjamBaru['buku_id']);
        $updateBuku->update(['peminjam_id' => $peminjam['id']]);

        return redirect('/peminjam');
    }
}
