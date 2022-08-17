<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;
    protected $table = 'donasis';
    protected $fillable = [
        'nomor_donasi',
        'nama',
        'email',
        'alamat',
        'no_hp',
        'user_id',
        'judul_buku',
        'jumlah_buku',
        'kategori_id',
        'foto_cover',
        'status',
        'upload_bukti',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
