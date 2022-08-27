<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Murid;
use App\Models\PeminjamanBuku;
use Illuminate\Http\Request;

class PeminjamanBukuController extends Controller
{
    public function index(Request $request)
    {
        $murid = Murid::all();
        $buku = Buku::where('jumlah_buku', '>', 0)->get();
        if (request()->cari) {
            $cari = $request->cari;
            $peminjaman = PeminjamanBuku::join('bukus', 'peminjaman_bukus.buku_id', '=', 'bukus.id')
                ->where('bukus.judul_buku', 'LIKE', '%' . $cari . '%')->get();
        } else {
            $peminjaman = PeminjamanBuku::get();
        }
        return view('admin.peminjaman.index', compact('peminjaman', 'murid', 'buku'));
    }

    public function pinjam(Request $request)
    {

        $pinjam = PeminjamanBuku::create([
            'buku_id' => $request->buku_id,
            'murid_id' => $request->murid_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'status' => 'Dipinjam',
            'keterangan' => $request->keterangan,
        ]);
        $buku = Buku::where('id', $pinjam->buku_id)->first();
        $buku->jumlah_buku -= $pinjam->jumlah_pinjam;
        $buku->save();

        return redirect()->back()->with('sukses', 'Buku Berhasil Dipinjam');
    }
    public function kembali(Request $request, $id)
    {

        $pinjam = PeminjamanBuku::find($id);
        $pinjam->tanggal_kembali = now();
        $pinjam->status = 'Selesai';
        $pinjam->save();
        $buku = Buku::where('id', $pinjam->buku_id)->first();
        $buku->jumlah_buku += $pinjam->jumlah_pinjam;
        $buku->save();

        return redirect()->back()->with('sukses', 'Buku Berhasil Dipinjam');
    }
}
