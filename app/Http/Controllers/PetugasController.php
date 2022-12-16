<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function simpan(Request $request) {
        $petugasBaru = $request->validate([
            'nama_petugas' => 'required',
        ]);
        $user = User::find(Auth::user()->id);
        $petugasBaru['id'] = 'PTG' . random_int(00001, 99999);
        $petugasBaru['user_id'] = Auth::user()->id;

        $user->update(['petugas_id'=> $petugasBaru['id']]);

        Petugas::create($petugasBaru);
        return redirect('/petugas');
    }

    public function tampil(Request $request) {
        $user = User::all();
        $petugas = Petugas::all();
        return view('petugas', ['petugas'=>$petugas, 'users'=>$user]);
        // $petugas = Petugas::find(1);
        // return $petugas->bukus;

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
