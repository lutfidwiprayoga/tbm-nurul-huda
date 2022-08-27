@extends('admin.layouts.master')

@section('main')
    @if (session()->get('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('sukses') }}</strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- Data Donasi Belum Validasi -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <p class="card-title">Donasi Buku Masuk</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs customtab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home1" role="tabpanel1"
                                        aria-selected="false">Belum Upload Bukti({{ $validasi->count() }})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#home2" role="tabpanel2"
                                        aria-selected="false">Sedang Dikirim({{ $diterima->count() }})</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!--Menunggu Verifikasi-->
                                <div class="tab-pane fade active show" id="home1" role="tabpanel">
                                    <div class="pd-20">
                                        <div class="table-responsive">
                                            <table class="display expandable-table" style="width:100%" id="table-report1">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nomor Donasi</th>
                                                        <th>Nama Donatur</th>
                                                        <th>Email Donatur</th>
                                                        <th>Alamat Donatur</th>
                                                        <th>No Hp Donatur</th>
                                                        <th>Tanggal Donasi</th>
                                                        <th>Judul Buku</th>
                                                        <th>Jumlah Buku</th>
                                                        <th>Kategori Buku</th>
                                                        <th>Foto Cover</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($validasi as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->nomor_donasi }}</td>
                                                            <td>{{ $row->nama }}</td>
                                                            <td>{{ $row->email }}</td>
                                                            <td>{{ $row->alamat }}</td>
                                                            <td>{{ $row->no_hp }}</td>
                                                            <td>{{ date('l, d F Y', strtotime($row->created_at)) }}</td>
                                                            <td>{{ $row->judul_buku }}</td>
                                                            <td>{{ $row->jumlah_buku }}</td>
                                                            <td>{{ $row->kategori->nama }}</td>
                                                            <td><img src="{{ url('foto_cover/' . $row->foto_cover) }}"
                                                                    width="50px">
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
                                        <div class="table-responsive">
                                            <table class="display expandable-table" style="width:100%" id="table-report2">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nomor Donasi</th>
                                                        <th>Nama Donatur</th>
                                                        <th>Email Donatur</th>
                                                        <th>Alamat Donatur</th>
                                                        <th>No Hp Donatur</th>
                                                        <th>Judul Buku</th>
                                                        <th>Jumlah Buku</th>
                                                        <th>Jenis Buku</th>
                                                        <th>Foto Cover</th>
                                                        <th>Bukti Foto</th>
                                                        <th>Status Donasi</th>
                                                        <th>Validasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($diterima as $i => $row)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->nomor_donasi }}</td>
                                                            <td>{{ $row->nama }}</td>
                                                            <td>{{ $row->email }}</td>
                                                            <td>{{ $row->alamat }}</td>
                                                            <td>{{ $row->no_hp }}</td>
                                                            <td>{{ $row->judul_buku }}</td>
                                                            <td>{{ $row->jumlah_buku }}</td>
                                                            <td>{{ $row->kategori->nama }}</td>
                                                            <td><img src="{{ url('foto_cover/' . $row->foto_cover) }}"
                                                                    width="80px">
                                                            </td>
                                                            <td><a type="button" class="badge badge-warning"
                                                                    data-toggle="modal"
                                                                    data-target="#bukti{{ $row->id }}">Lihat Bukti</a>
                                                            </td>
                                                            <td>
                                                                <div class="badge badge-info">{{ $row->status }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('donasi.update', $row->id) }}"
                                                                    method="POST">
                                                                    @csrf @method('PUT')
                                                                    <button type="submit"
                                                                        class="btn btn-success btn-sm">Terima</button>
                                                                </form>
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
    <!-- Data Donasi Sudah Diterima -->
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <p class="card-title">Data Donasi Buku</p>
                        </div>
                        <div class="col-md-3 text-right">
                            <button class="btn btn-primary btn-sm" data-target="#donasiLangsung" data-toggle="modal">Donasi
                                Langsung</button>
                            <a href="{{ route('cetakpdf.donasi') }}" class="btn btn-primary btn-sm">Cetak PDF</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div class="row" style="float: right">
                                    <div class="col-md-12">
                                        <form action="{{ route('donasi.index') }}" method="GET">
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-3 col-form-label">Cari</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="cari" class="form-control">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="display expandable-table" style="width:100%" id="table-report3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Donasi</th>
                                            <th>Nama Donatur</th>
                                            <th>Email Donatur</th>
                                            <th>Alamat Donatur</th>
                                            <th>No Hp Donatur</th>
                                            <th>Tanggal Donasi</th>
                                            <th>Judul Buku</th>
                                            <th>Jumlah Buku</th>
                                            <th>Kategori Buku</th>
                                            <th>Foto Cover</th>
                                            <th>Upload Bukti</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tervalidasi as $i => $row)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $row->nomor_donasi }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->alamat }}</td>
                                                <td>{{ $row->no_hp }}</td>
                                                <td>{{ date('l, d F Y', strtotime($row->created_at)) }}</td>
                                                <td>{{ $row->judul_buku }}</td>
                                                <td>{{ $row->jumlah_buku }}</td>
                                                <td>{{ $row->kategori->nama }}</td>
                                                <td><img src="{{ url('foto_cover/' . $row->foto_cover) }}" width="50px">
                                                </td>
                                                <td><img src="{{ url('upload_bukti/' . $row->upload_bukti) }}"
                                                        width="50px">
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
    <!-- Modal Tambah data-->
    <div class="modal fade" id="donasiLangsung" tabindex="-1" aria-labelledby="donasiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Input Donasi Buku Secara Langsung</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('donasi.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Nama Donatur</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Email Donatur</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Alamat Donatur</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="alamat" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">No Hp Donatur</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="no_hp" required>
                                            </div>
                                        </div>
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
                                            <label class="col-sm-4 col-form-label">Kategori Buku</label>
                                            <div class="col-sm-8">
                                                <select name="kategori_id" class="form-control">
                                                    @foreach ($kategori as $kt)
                                                        <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Foto Cover</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-sm btn-primary"
                                                            type="button">Upload</button>
                                                    </div>
                                                    <input type="file" class="form-control" name="foto_cover"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Upload Bukti</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-sm btn-primary"
                                                            type="button">Upload</button>
                                                    </div>
                                                    <input type="file" class="form-control" name="upload_bukti"
                                                        required>
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
    @foreach ($diterima as $i => $row)
        <div class="modal fade" id="bukti{{ $row->id }}" tabindex="-1" aria-labelledby="buktiLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ url('upload_bukti/' . $row->upload_bukti) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
{{-- @section('javascript')
    <script>
        $(document).ready(function() {
            var tableLaporan1 = $('#table-report1').DataTable({});
            var tableLaporan2 = $('#table-report2').DataTable({});
            var tableLaporan3 = $('#table-report3').DataTable({});
        });
    </script>
@endsection --}}
