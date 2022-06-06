<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donasi;
use Illuminate\Http\Request;

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

    public function index()
    {
        $validasi = Donasi::where('status', 'Menunggu Verifikasi')->get();
        $diterima = Donasi::where('status', 'Dikirim')->get();
        $tervalidasi = Donasi::where('status', 'Sudah Diterima')->get();
        return view('admin.donasi.index', compact('validasi', 'tervalidasi', 'diterima'));
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
        //
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
        $donasi->status = 'Terverifikasi';
        $donasi->save();
        return redirect()->back()->with('sukses', 'Donasi Sudah Diverifikasi');
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
