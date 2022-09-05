<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';
    protected $fillable = [
        'tanggal',
        'pengajar_id',
        'mata_pelajaran',
        'jam',
    ];

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class, 'pengajar_id', 'id');
    }
}
