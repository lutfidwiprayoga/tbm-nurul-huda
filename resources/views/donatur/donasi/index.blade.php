@extends('admin.layouts.master')
@section('main')
    @if (session()->get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('sukses') }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <p class="card-title">Data Buku Donasi</p>
                        </div>
                        <div class="col-md-2 pull-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#donasiModal">
                                Tambah Donasi
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home1" role="tabpanel1"
                                        aria-selected="false">Proses({{ $diverifikasi->count() }})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#home2" role="tabpanel2"
                                        aria-selected="false">Terverifikasi({{ $terverifikasi->count() }})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#home3" role="tabpanel2"
                                        aria-selected="false">Diterima({{ $diterima->count() }})</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!--Menunggu Verifikasi-->
                                <div class="tab-pane fade active show" id="home1" role="tabpanel">
                                    <div class="pd-20">
                                        <div class="table-responsive">
                                            <table class="display expandable-table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul Buku</th>
                                                        <th>Jumlah Buku</th>
                                                        <th>Jenis Buku</th>
                                                        <th>Foto Cover</th>
                                                        <th>Status Donasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($diverifikasi as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->judul_buku }}</td>
                                                            <td>{{ $row->jumlah_buku }}</td>
                                                            <td>{{ $row->jenis_buku }}</td>
                                                            <td><img src="{{ url('foto_cover/' . $row->foto_cover) }}"
                                                                    width="80px">
                                                            </td>
                                                            <td>
                                                                <div class="badge badge-warning">{{ $row->status }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!--Terverifikasi-->
                                <div class="tab-pane fade" id="home2" role="tabpanel2">
                                    <div class="pd-20">
                                        @foreach ($terverifikasi as $i => $row)
                                            <div class="table-responsive">
                                                <table class="display expandable-table" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Judul Buku</th>
                                                            <th>Jumlah Buku</th>
                                                            <th>Jenis Buku</th>
                                                            <th>Foto Cover</th>
                                                            <th>Status Donasi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->judul_buku }}</td>
                                                            <td>{{ $row->jumlah_buku }}</td>
                                                            <td>{{ $row->jenis_buku }}</td>
                                                            <td><img src="{{ url('foto_cover/' . $row->foto_cover) }}"
                                                                    width="80px">
                                                            </td>
                                                            <td>
                                                                <div class="badge badge-info">{{ $row->status }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                @if ($row->upload_bukti == null)
                                                    <div class="col-md-10">
                                                        <p>
                                                            <font color='grey'>Silahkan tekan tombol berikut
                                                                untuk
                                                                upload Bukti Donasi.</font>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-outline-success btn-round btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#uploadBukti{{ $row->id }}">Upload
                                                            Sekarang</button>
                                                    </div>
                                                @else
                                                    <div class="col-md-10">
                                                        <p>
                                                            <font color='grey'>Terima Kasih Bukti Donasi Anda
                                                                sedang diproses</font>
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--Sudah Diterima-->
                                <div class="tab-pane fade" id="home3" role="tabpanel2">
                                    <div class="pd-20">
                                        <div class="table-responsive">
                                            <table class="display expandable-table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Judul Buku</th>
                                                        <th>Jumlah Buku</th>
                                                        <th>Jenis Buku</th>
                                                        <th>Foto Cover</th>
                                                        <th>Status Donasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($diterima as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->judul_buku }}</td>
                                                            <td>{{ $row->jumlah_buku }}</td>
                                                            <td>{{ $row->jenis_buku }}</td>
                                                            <td><img src="{{ url('foto_cover/' . $row->foto_cover) }}"
                                                                    width="80px">
                                                            </td>
                                                            <td>
                                                                <div class="badge badge-success">{{ $row->status }}
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah data-->
    <div class="modal fade" id="donasiModal" tabindex="-1" aria-labelledby="donasiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Input Donasi Buku</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('donatur.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Judul Buku</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="judul_buku" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Jumlah Buku</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="jumlah_buku" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Jenis Buku</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="jenis_buku" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Foto Cover</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-sm btn-primary" type="button">Upload</button>
                                                    </div>
                                                    <input type="file" class="form-control" name="foto_cover" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3" style="justify-content: center">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">
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
    <!-- Modal Upload Bukti-->
    @foreach ($terverifikasi as $i => $row)
        <div class="modal fade" id="uploadBukti{{ $row->id }}" tabindex="-1" aria-labelledby="uploadBuktiLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <strong>Form Upload Bukti Donasi Buku</strong>
                            </div>
                            <div class="card-body">
                                <form class="form-sample" action="{{ route('donatur.update', $row->id) }}"
                                    method="post" enctype="multipart/form-data">
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
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">
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
    @endforeach
@endsection
