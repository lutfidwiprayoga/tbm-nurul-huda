<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->buku = new Buku();
        $this->middleware('auth');
    }

    public function index()
    {
        $now = Carbon::now();
        $tanggal = $now->day . $now->month . $now->year;
        $max_id = DB::table('bukus')->max('id');
        $nomor_urut = $max_id + 1;
        $buku = Buku::latest()->get();
        return view('admin.databuku.index', compact('buku', 'tanggal', 'nomor_urut'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.databuku.create');
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
            'nama_pengarang' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_halaman' => 'required',
            'jumlah_buku' => 'required',
            'jenis_buku' => 'required',
            'kategori' => 'required',
            'foto_cover' => 'required|mimes:png,jpg,jpeg,svg',
        ]);
        $file = $request->foto_cover;
        $filename = $request->kode_buku . '.' . $file->extension();
        $file->move(public_path('foto_cover'), $filename);
        Buku::create([
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'nama_pengarang' => $request->nama_pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'jumlah_halaman' => $request->jumlah_halaman,
            'jumlah_buku' => $request->jumlah_buku,
            'jenis_buku' => $request->jenis_buku,
            'kategori' => $request->kategori,
            'foto_cover' => $filename,
        ]);
        // if ($request->hasFile('foto_cover')) {
        //     $request->file('foto_cover')->move('foto_cover/', $request->file('foto_cover')->getClientOriginalName());
        //     $buku->foto_cover = $request->file('foto_cover')->getClientOriginalName();
        //     $buku->save();
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
        $buku = Buku::find($id);
        $buku->jumlah_buku = $request->jumlah_buku;
        $buku->save();
        return redirect()->back()->with('sukses', 'Jumlah Buku Telah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        if ($buku->foto_cover <> "") {
            unlink(public_path('foto_cover') . '/' . $buku->foto_cover);
        }
        $buku->delete();
        return redirect()->back()->with('sukses', 'Data sukses Dihapus');
    }
}
