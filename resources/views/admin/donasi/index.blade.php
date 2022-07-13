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
                                        aria-selected="false">Donasi
                                        Masuk({{ $validasi->count() }})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#home2" role="tabpanel2"
                                        aria-selected="false">Terverifikasi({{ $diterima->count() }})</a>
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
                                                        <th>Nomor Donasi</th>
                                                        <th>Nama Donatur</th>
                                                        <th>Email Donatur</th>
                                                        <th>Alamat Donatur</th>
                                                        <th>No Hp Donatur</th>
                                                        <th>Tanggal Donasi</th>
                                                        <th>Judul Buku</th>
                                                        <th>Jumlah Buku</th>
                                                        <th>Jenis Buku</th>
                                                        <th>Foto Cover</th>
                                                        <th>Validasi</th>
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
                                                            <td>{{ $row->jenis_buku }}</td>
                                                            <td><img src="{{ url('foto_cover/' . $row->foto_cover) }}"
                                                                    width="50px">
                                                            </td>
                                                            <td><a href="{{ route('donasi.edit', $row->id) }}"
                                                                    class="btn btn-primary btn-sm">Validasi</a></td>
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
                                        @foreach ($diterima as $i => $row)
                                            <div class="table-responsive">
                                                <table class="display expandable-table" style="width:100%">
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
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $row->nomor_donasi }}</td>
                                                            <td>{{ $row->nama }}</td>
                                                            <td>{{ $row->email }}</td>
                                                            <td>{{ $row->alamat }}</td>
                                                            <td>{{ $row->no_hp }}</td>
                                                            <td>{{ $row->judul_buku }}</td>
                                                            <td>{{ $row->jumlah_buku }}</td>
                                                            <td>{{ $row->jenis_buku }}</td>
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
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
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
                        <div class="col-md-10">
                            <p class="card-title">Data Donasi Buku</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="display expandable-table" style="width:100%">
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
                                            <th>Jenis Buku</th>
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
                                                <td>{{ $row->jenis_buku }}</td>
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
