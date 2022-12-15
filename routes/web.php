<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PeminjamController;

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

Route::get('/', [PenerbitController::class, 'tampil']);

Route::post('/penerbit', [PenerbitController::class, 'simpan']);
Route::post('/buku', [BukuController::class, 'simpan']);
Route::get('/buku/hapus/{id}', [BukuController::class, 'hapus']);
Route::get('/buku/edit/{id}', [BukuController::class, 'editTampil']);
Route::post('/buku/edit/{id}', [BukuController::class, 'edit']);

Route::get('/peminjam', [PeminjamController::class, 'tampil']);
Route::post('/peminjam', [PeminjamController::class, 'simpan']);