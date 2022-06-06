<?php

use App\Http\Controllers\Admin\DataBukuController;
use App\Http\Controllers\Admin\DonasiController;
use App\Http\Controllers\Admin\JadwalTBMController;
use App\Http\Controllers\Admin\MuridController;
use App\Http\Controllers\Admin\PeminjamanBukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Donatur\DonasiController as DonaturDonasiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/coba', function () {
    return view('admin.dashboard2');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::prefix('admin')->group(function () {
    Route::resource('/buku', DataBukuController::class);
    Route::resource('/jadwal', JadwalTBMController::class);
    Route::resource('/donasi', DonasiController::class);
    Route::resource('/murid', MuridController::class);
    Route::get('/pinjambuku', [PeminjamanBukuController::class, 'index'])->name('pinjambuku.index');
    Route::post('/pinjambuku/tambah', [PeminjamanBukuController::class, 'pinjam'])->name('pinjambuku.pinjam');
    Route::put('/pinjambuku/kembali/{id}', [PeminjamanBukuController::class, 'kembali'])->name('pinjambuku.kembali');
});
Route::prefix('donatur')->group(function () {
    Route::resource('/donatur', DonaturDonasiController::class);
});
