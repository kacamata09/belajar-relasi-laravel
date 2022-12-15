<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_buku',
        'tahun_terbit',
        'penerbit_id',
        'peminjam_id',
        'stok'
    ];
    public function penerbit() {
        return $this->belongsTo(Penerbit::class);
    }
    
    public function peminjam() {
        return $this->belongsTo(Peminjam::class);
    }
}
