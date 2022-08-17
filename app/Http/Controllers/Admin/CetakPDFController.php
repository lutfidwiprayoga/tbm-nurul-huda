<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CetakPDFController extends Controller
{
    public function donasiPDF()
    {
        $donasi = Donasi::latest()->where('status', 'Sudah Diterima')->get();
        $pdf = Pdf::loadView('admin.donasi.pdf', compact('donasi'))->setPaper('A4', 'landscape');
        return $pdf->download('rekap-donasi.pdf');
    }
}
