<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        Kategori::create([
            'nama' => $request->nama,
        ]);

        return redirect()->back()->with('sukses', 'Kategori Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect()->back()->with('sukses', 'Berhasil Dihapus');
    }
}
