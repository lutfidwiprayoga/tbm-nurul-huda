@extends('donatur.layouts.app')
@section('frontend')
    <div class="banner">
        <div class="container">
            <div class="card-donatur">
                <div class="card-body-donatur">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table-condensed">
                                <tr id="status_id">
                                    <th width="50%">Status Pemesanan</th>
                                    <th width="30px">:</th>
                                    @if ($donasi->status == 'Menunggu Verifikasi')
                                        <th style="color: orange" id="status">{{ $donasi->status }}</th>
                                    @elseif ($donasi->status == 'Dikirim')
                                        <th style="color: blue" id="status">{{ $donasi->status }}</th>
                                    @elseif ($donasi->status == 'Sudah Diterima')
                                        <th style="color: green" id="status">{{ $donasi->status }}</th>
                                    @endif
                                </tr>
                                <tr>
                                    <th width="50%">Nomor Donasi</th>
                                    <th width="30px">:</th>
                                    <th>{{ $donasi->nomor_donasi }}</th>
                                </tr>
                                <tr>
                                    <th width="50%">Nama Donatur</th>
                                    <th width="30px">:</th>
                                    <th>{{ $donasi->nama }}</th>
                                </tr>
                                <tr>
                                    <th width="50%">Email Donatur</th>
                                    <th width="30px">:</th>
                                    <th>{{ $donasi->email }}</th>
                                </tr>
                                <tr>
                                    <th width="50%">Tanggal Donasi</th>
                                    <th width="30px">:</th>
                                    <th>{{ date('l, d-m-Y', strtotime($donasi->created_at)) }} Pukul
                                        {{ date('H:i', strtotime($donasi->created_at)) }} WIB
                                    </th>
                                </tr>
                                <tr>
                                    <th width="50%">Alamat Donatur</th>
                                    <th width="30px">:</th>
                                    <th>{{ $donasi->alamat }}</th>
                                </tr>
                                <tr>
                                    <th width="50%">No Hp</th>
                                    <th width="30px">:</th>
                                    <th>{{ $donasi->no_hp }}</th>
                                </tr>
                                <tr id="exp_id">
                                    <th width="50%">Judul Buku Donasi</th>
                                    <th width="30px">:</th>
                                    <th>{{ $donasi->judul_buku }}</th>
                                </tr>
                                <tr>
                                    <th width="50%">Jenis Buku Donasi</th>
                                    <th width="30px">:</th>
                                    <th>{{ $donasi->kategori->nama }}</th>
                                </tr>
                                <tr>
                                    <th width="50%">Jumlah Buku Donasi</th>
                                    <th width="30px">:</th>
                                    <th>{{ $donasi->jumlah_buku }}</th>
                                </tr>
                                <tr>
                                    <th width="50%">Foto Cover Buku</th>
                                    <th width="30px">:</th>
                                    <th><button class="btn btn-secondary btn-sm"
                                            data-target="#fotoCover{{ $donasi->id }}" data-toggle="modal">Lihat Foto
                                            Cover</button>
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div
                                style="min-height: 200px;background: #9eafeb;padding: 25px; border-radius: 20px; text-align: center">
                                @if ($donasi->status == 'Menunggu Verifikasi')
                                    <button class="btn btn-warning">Sedang Diverifikasi</button>
                                @elseif ($donasi->status == 'Terverifikasi')
                                    <button class="btn btn-info" data-toggle="modal"
                                        data-target="#buktiDonasi{{ $donasi->id }}">Upload
                                        Bukti</button>
                                @else
                                    <button class="btn btn-success">Selesai</button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <p class="text-center">
                        Jangan Lupa Meyimpan Nomor Donasi Untuk Mengetahui Status Pemesanan Anda
                    </p>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal Foto Cover -->
    <div class="modal fade" id="fotoCover{{ $donasi->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ url('foto_cover/' . $donasi->foto_cover) }}" width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Upload Bukti-->
    <div class="modal fade" id="buktiDonasi{{ $donasi->id }}" tabindex="-1" aria-labelledby="buktiDonasiLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Upload Bukti Donasi Buku</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('donatur.update', $donasi->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-1 align-items-center">
                                            <div class="col col-stats ml-3 ml-sm-0">
                                                <div class="numbers">
                                                    <h5 class="card-title text-center">Kirim Donasi Anda Ke
                                                        Alamat Di Bawah Ini :</h5>
                                                    <h5 class="card-category text-center" style="font-weight: bold;">
                                                        Taman Baca Masyarakat Nurul Huda Desa Langring
                                                    </h5>
                                                    <p class="card-category text-center" style="font-weight: normal">
                                                        Jl. Desa Langring
                                                        Jambesari Kec. Giri Kab. Banyuwangi Jawa Timur
                                                        68421
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0 align-items-center">
                                            <div class="col col-stats ml-3 ml-sm-0">
                                                <div class="numbers">
                                                    <h5 class="card-title text-center">Upload Bukti</h5>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control-file text-center"
                                                            name="upload_bukti" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3" style="justify-content: center">
                                    <button type="button" class="btn btn-light mr-2" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-dot-circle-o"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
