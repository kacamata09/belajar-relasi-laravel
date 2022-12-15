<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjam;
use App\Models\Buku;

class PeminjamController extends Controller
{
    //
    public function tampil(Request $request){
        $peminjam = Peminjam::all();
        $buku = Buku::all();
        if ($request->query('bukupinjaman') == '1') {
            return view('listBukuPinjam', ['peminjam'=> $peminjam]);
        }        

        return view('peminjam', ['peminjam' => $peminjam, 'buku'=>$buku]);
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

    public function kembalikan(Request $request, $id) {
        $userPinjam = Peminjam::find($id);
        $bukuPinjaman = Buku::find($userPinjam['buku_id']);
        $bukuPinjaman->update(['peminjam_id' => null]);
        $userPinjam->delete();
        return redirect('/peminjam');
        
    }

}
