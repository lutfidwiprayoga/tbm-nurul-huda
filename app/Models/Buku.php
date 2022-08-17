<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'Bukus';
    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'nama_pengarang',
        'tahun_terbit',
        'jumlah_halaman',
        'jumlah_buku',
        'kategori_id',
        'foto_cover',
    ];

    public function pinjams()
    {
        return $this->hasMany(PeminjamanBuku::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
