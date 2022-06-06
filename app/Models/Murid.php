<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;
    protected $table = 'murids';
    protected $fillable = ['nama', 'alamat', 'umur', 'sekolah'];

    public function pinjams()
    {
        return $this->hasMany(PeminjamanBuku::class);
    }
}
