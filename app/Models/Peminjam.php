<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peminjam',
        'alamat',
        'buku_id',
    ];

    public function buku() {
        return $this->hasOne(Buku::class);
    }
}
