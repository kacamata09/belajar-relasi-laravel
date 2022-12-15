<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function simpan(Request $request) {
        $petugasBaru = $request->validate([
            'nama_petugas' => 'required',
        ]);

        Petugas::create($petugasBaru);
        return redirect('/petugas');
    }

    public function tampil(Request $request) {
        $petugas = Petugas::all();
        return view('petugas', ['petugas'=>$petugas]);
    }

    public function hapus($id) {
        $hapusPetugas = Petugas::find($id);
        $hapusPetugas->delete();
        return redirect('/petugas');
    }

    public function edit(Request $request, $id) {
        $dataPetugas = $request->validate([
            'nama_petugas' => 'required'
        ]);

        $updatePetugas = Petugas::find($id);
        $updatePetugas->update($dataPetugas);

        return redirect('/petugas');
    
    }
}
