<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $request->validate([
            'judul_buku' => 'required',
            'jumlah_buku' => 'required',
            'jenis_buku' => 'required',
            'foto_cover' => 'required|max:200|mimes:png,jpg,jpeg,svg',
        ]);
        $file = $request->foto_cover;
        $filename = Auth::user()->name . '.' . $file->extension();
        $file->move(public_path('foto_cover'), $filename);
        Donasi::create([
            'user_id' => Auth::user()->id,
            'judul_buku' => $request->judul_buku,
            'jumlah_buku' => $request->jumlah_buku,
            'jenis_buku' => $request->jenis_buku,
            'status' => 'Menunggu Verifikasi',
            'foto_cover' => $filename,
        ]);
        // if ($request->hasFile('foto_cover')) {
        //     $request->file('foto_cover')->move('foto_cover/', $request->file('foto_cover')->getClientOriginalName());
        //     $donasi->foto_cover = $request->file('foto_cover')->getClientOriginalName();
        //     $donasi->save();
        // }
        return redirect()->back()->with('sukses', 'data buku berhasil disimpan');
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
        //
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
        $file = $request->upload_bukti;
        $filename = Auth::user()->name . '.' . $file->extension();
        $file->move(public_path('upload_bukti'), $filename);
        $donasi = Donasi::find($id);
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
