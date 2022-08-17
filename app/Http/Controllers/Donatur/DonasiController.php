<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Mail\DonaturMail;
use App\Models\Donasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $diverifikasi = Donasi::where('donasis.user_id', $user)->where('status', 'Menunggu Verifikasi')->get();
        $terverifikasi = Donasi::where('donasis.user_id', $user)->where('status', 'Terverifikasi')->get();
        $diterima = Donasi::where('donasis.user_id', $user)->where('status', 'Sudah Diterima')->get();
        return view('donatur.donasi.index', compact('diverifikasi', 'user', 'terverifikasi', 'diterima'));
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
        // dd($request->all());
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
        $file = $request->foto_cover;
        $filename = $request->nama . '.' . $file->extension();
        $file->move(public_path('foto_cover'), $filename);
        $donasi = Donasi::create([
            // 'user_id' => Auth::user()->id,
            'nomor_donasi' => 'DNTBM' . '-' . $tanggal . '00' . $nomor_urut,
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'judul_buku' => $request->judul_buku,
            'jumlah_buku' => $request->jumlah_buku,
            'kategori_id' => $request->kategori_id,
            'status' => 'Menunggu Verifikasi',
            'foto_cover' => $filename,
        ]);
        // if ($request->hasFile('foto_cover')) {
        //     $request->file('foto_cover')->move('foto_cover/', $request->file('foto_cover')->getClientOriginalName());
        //     $donasi->foto_cover = $request->file('foto_cover')->getClientOriginalName();
        //     $donasi->save();
        // }
        $data = array(
            'nama' => $donasi->nama,
            'nomor_donasi' => $donasi->nomor_donasi,
            'email' => $donasi->email,
            'no_hp' => $donasi->no_hp,
            'judul_buku' => $donasi->judul_buku,
            'jenis_buku' => $donasi->jenis_buku,
            'jumlah_buku' => $donasi->jumlah_buku,
            'created_at' => $donasi->created_at,
        );
        // dd($donasi->email);
        Mail::to($donasi->email)->send(new DonaturMail($data));
        // dd($aaa);
        return redirect()->route('donatur.edit', $donasi->id)->with('sukses', 'data buku berhasil disimpan');
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
        $donasi = Donasi::find($id);
        return view('donatur.donasi.edit', compact('donasi'));
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
        $file = $request->upload_bukti;
        $filename = $donasi->nama . '.' . $file->extension();
        $file->move(public_path('upload_bukti'), $filename);
        $donasi->status = 'Dikirim';
        $donasi->upload_bukti = $filename;
        $donasi->save();
        // if ($request->hasFile('upload_bukti')) {
        //     $request->file('upload_bukti')->move('upload_bukti/', $request->file('upload_bukti')->getClientOriginalName());
        //     $donasi->upload_bukti = $request->file('upload_bukti')->getClientOriginalName();
        //     $donasi->save();
        // }

        return redirect()->back()->with('sukses', 'Sukses Upload Bukti');
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
