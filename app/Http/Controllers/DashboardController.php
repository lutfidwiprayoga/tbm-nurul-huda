<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Donasi;
use App\Models\Jadwal;
use App\Models\Murid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $users = DB::table('buku')
        //     ->selectRaw('sum(total) as sum, user_types.name as name')
        //     ->pluck('sum', 'name');
        $buku = Buku::all()->count();
        $donasi = Donasi::all()->count();
        $total_buku = $buku + $donasi;
        $murid = Murid::all()->count();
        $jadwal = Jadwal::all()->count();
        $donatur = User::where('role_user', 'donatur')->count();
        return view('admin.dashboard', compact('donatur', 'murid', 'jadwal', 'total_buku'));
    }
}
