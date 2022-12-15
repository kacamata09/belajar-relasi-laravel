<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function register(Request $request) {
        $dataUser = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $dataUser['password'] = bcrypt($dataUser['password']);

        User::create($dataUser);
        return redirect('/login');
        
    }

    public function login(Request $request) {
        $dataLogin = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // // cara lama
        // $user = User::where('email', $dataLogin['email']);
        // $checkLogin = Hash::check($dataLogin['password'], $user->password);
        // if ($checkLogin) {
        //     return redirect('/');
        // }
        // return redirect('/login');

        // cara baru
        if(Auth::attempt($dataLogin)) {
            $request->session()-> regenerate();
            return redirect()-> intended('/');
        } 

        return back()->with('logingagal', 'maaf anda gagal login');
    }
    public function tampillogin() {
        return view('login');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request -> session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function tampilregister() {
        return view('register');
    }
}
