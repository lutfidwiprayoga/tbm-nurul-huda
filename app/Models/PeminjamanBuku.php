<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBuku extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_bukus';
    protected $fillable = [
        'buku_id',
        'murid_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jumlah_pinjam',
        'status',
        'keterangan'
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'murid_id', 'id');
    }
}
