<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;

class CariController extends Controller
{

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        // mengambil data dari table pegawai sesuai pencarian data
        $donasi = Donasi::where('nomor_donasi', 'like', "%" . $cari . "%")->get();
        return view('donatur.donasi.cari', compact('donasi'));
    }
}
