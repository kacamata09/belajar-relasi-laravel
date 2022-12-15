<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PenerbitController::class, 'tampil'])->middleware('auth');

Route::get('/login', [UserController::class, 'tampillogin'])->name('login');
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'tampilregister']);
Route::post('/register', [UserController::class, 'register']);

Route::post('/penerbit', [PenerbitController::class, 'simpan']);

Route::middleware('auth')->prefix('buku')->group(function () {
    Route::post('/', [BukuController::class, 'simpan']);
    Route::get('/hapus/{id}', [BukuController::class, 'hapus']);
    Route::get('/edit/{id}', [BukuController::class, 'editTampil']);
    Route::post('/edit/{id}', [BukuController::class, 'edit']);
});
Route::middleware('auth')->prefix('peminjam')->group(function () {
    Route::get('/', [PeminjamController::class, 'tampil']);
    Route::post('/', [PeminjamController::class, 'simpan']);
    Route::get('/kembalikan/{id}', [PeminjamController::class, 'kembalikan']);
});
Route::middleware('auth')->prefix('petugas')->group(function () {
    Route::get('/', [PetugasController::class, 'tampil']);
    Route::post('/', [PetugasController::class, 'simpan']);
    Route::get('//edit/{id}', [PetugasController::class, 'edit']);
    Route::get('/hapus/{id}', [PetugasController::class, 'hapus']);
});



