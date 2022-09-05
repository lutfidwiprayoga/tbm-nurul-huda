<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Murid;
use App\Models\Pengajar;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->cari_murid) {
            $cari_murid = $request->cari_murid;
            $murid = Murid::where('nama', 'LIKE', '%' . $cari_murid . '%')->latest()->get();
        } else {
            $murid = Murid::latest()->get();
        }
        if (request()->cari_pengajar) {
            $cari_pengajar = $request->cari_pengajar;
            $pengajar = Pengajar::where('nama', 'LIKE', '%' . $cari_pengajar . '%')->latest()->get();
        } else {
            $pengajar = Pengajar::latest()->get();
        }
        return view('admin.murid.index', compact('murid', 'pengajar'));
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
        Murid::create($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Ditambahkan');
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
        $murid = Murid::find($id);
        $murid->status = $request->status;
        $murid->save();
        return redirect()->back()->with('sukses', 'Status Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $murid = Murid::find($id);
        $murid->delete();
        return redirect()->back()->with('sukses', 'Data berhasil dihapus');
    }
}
