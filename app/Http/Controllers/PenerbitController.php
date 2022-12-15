<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use App\Models\Buku;

class PenerbitController extends Controller
{
    //
    public function simpan(Request $request) {
        $penertbitBaru = $request->validate([
            'nama_penerbit' => 'required|min:6'
        ]);

        Penerbit::create($penertbitBaru);
        return redirect('/');
    }

    public function tampil() {
        $penerbit = Penerbit::all();
        $buku = Buku::all();
        return view('beranda', ['penerbit' => $penerbit, 'buku' => $buku]);

    }
}
