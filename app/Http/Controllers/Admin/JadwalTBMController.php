<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalTBMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagename = 'Data Jadwal TBM';
        $data = Jadwal::all();
        return view('admin.jadwalTBM.index', compact('data', 'pagename'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagename = 'Form Input Jadwal TBM';
        return view('admin.jadwalTBM.create', compact('pagename',));
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
            'tanggal' => 'required',
            'nama_pengajar' => 'required',
            'mata_pelajaran' => 'required',
        ]);
        $jadwal = $request->all();
        Jadwal::create($jadwal);
        return redirect()->back()->with('sukses', 'Jadwal berhasil Ditambahkan');
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
        $data_jadwalTBM = Jadwal::all();
        $pagename = 'Update JadwalTBM';
        $data = Jadwal::find($id);
        return view('admin.jadwalTBM.edit', compact('data', 'pagename', 'data_jadwalTBM'));
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
        $request->validate([
            'tanggal' => 'required',
            'nama_pengajar' => 'required',
            'mata_pelajaran' => 'required',
        ]);

        Jadwal::find($id)->update($request->all());
        return redirect()->back()->with('sukses', 'Jadwal berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwalTBM = Jadwal::find($id);
        $jadwalTBM->delete();
        return redirect()->back()->with('sukses', 'Jadwal berhasil dihapus');
    }
}
