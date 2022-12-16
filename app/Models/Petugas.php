<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_petugas',
        'user_id',
    ];

    public function bukus() {
        return $this->hasMany(Buku::class);
    }

    public function peminjams() {
        return $this->hasMany(Peminjam::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
