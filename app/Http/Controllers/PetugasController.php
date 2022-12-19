<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PetugasController extends Controller
{
    public function simpan(Request $request) {
        $user = User::find($request->id);
        $petugasBaru['nama_petugas'] = $user['name'];
        $petugasBaru['id'] = 'PTG' . random_int(00001, 99999);
        $petugasBaru['user_id'] = $request->id;
        $petugasBaru['status']  = 'aktif';

        $user->update(['petugas_id'=> $petugasBaru['id']]);

        Petugas::create($petugasBaru);
        return redirect('/petugas');
    }

    public function tampil(Request $request) {
        if (Auth::user()->jabatan != 'petugas tertinggi') {
            return 'anda tidak bisa mengakses';
        };

        $user = User::all();
        $petugas = Petugas::all();
        return view('petugas', ['petugas'=>$petugas, 'users'=>$user]);
        // $petugas = Petugas::find(1);
        // return $petugas->bukus;

    }



    public function hapus($id) {
        $hapusPetugas = Petugas::find($id);
        if ($hapusPetugas['status'] == 'nonaktif') {
            $hapusPetugas->update(['status'=>'aktif']);
        } else {
            $hapusPetugas->update(['status'=>'nonaktif']);
        }

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
