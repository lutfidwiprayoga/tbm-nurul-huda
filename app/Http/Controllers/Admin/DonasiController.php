<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use App\Models\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->donasi = new Donasi();
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $validasi = Donasi::latest()->where('status', 'Terverifikasi')->get();
        $diterima = Donasi::latest()->where('status', 'Dikirim')->get();
        if (request()->cari) {
            $cari = $request->cari;
            $tervalidasi = Donasi::where('nomor_donasi', 'LIKE', '%' . $cari . '%')
                ->orWhere('nama', 'LIKE', '%' . $cari . '%')
                ->latest()
                ->where('status', 'Sudah Diterima')
                ->get();
        } else {
            $tervalidasi = Donasi::latest()->where('status', 'Sudah Diterima')->get();
        }
        $kategori = Kategori::all();
        return view('admin.donasi.index', compact('validasi', 'tervalidasi', 'diterima', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'jumlah_buku' => 'required',
            'kategori_id' => 'required',
            'foto_cover' => 'required|max:200|mimes:png,jpg,jpeg,svg',
        ]);
        $now = Carbon::now();
        $tanggal = $now->day . $now->month . $now->year;
        $max_id = DB::table('donasis')->max('id');
        $nomor_urut = $max_id + 1;
        $file_cover = $request->foto_cover;
        $filename_cover = $request->nama . '.' . $file_cover->extension();
        $file_cover->move(public_path('foto_cover'), $filename_cover);
        $file_bukti = $request->upload_bukti;
        $filename_bukti = $request->nama . '.' . $file_bukti->extension();
        $file_bukti->move(public_path('upload_bukti'), $filename_bukti);
        Donasi::create([
            // 'user_id' => Auth::user()->id,
            'nomor_donasi' => 'DNTBM' . '-' . $tanggal . '00' . $nomor_urut,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'judul_buku' => $request->judul_buku,
            'jumlah_buku' => $request->jumlah_buku,
            'kategori_id' => $request->kategori_id,
            'status' => 'Sudah Diterima',
            'foto_cover' => $filename_cover,
            'upload_bukti' => $filename_bukti,
        ]);

        return redirect()->back()->with('sukses', 'Donasi Langsung Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $donasi = Donasi::find($id);
        // $donasi->status = 'Terverifikasi';
        // $donasi->save();
        // return redirect()->back()->with('sukses', 'Donasi Sudah Diverifikasi');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $donasi = Donasi::find($id);
        $donasi->status = 'Sudah Diterima';
        $donasi->save();
        return redirect()->back()->with('sukses', 'Donasi Sudah Diterima');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
