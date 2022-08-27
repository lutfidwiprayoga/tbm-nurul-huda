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
                            <p class="card-title">Data Buku</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#bukuModal">
                                Tambah Buku
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div class="row" style="float: right">
                                    <div class="col-md-12">
                                        <form action="{{ route('buku.index') }}" method="GET">
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-3 col-form-label">Cari</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="cari" class="form-control">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="display expandable-table" style="width:100%" id="table-report">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Buku</th>
                                            <th>Judul Buku</th>
                                            <th>Nama Pengarang</th>
                                            <th>Tahun Terbit</th>
                                            <th>Jumlah Halaman</th>
                                            <th>Jumlah Buku</th>
                                            <th>Kategori Buku</th>
                                            <th>Foto Cover</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($buku as $i => $row)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $row->kode_buku }}</td>
                                                <td>{{ $row->judul_buku }}</td>
                                                <td>{{ $row->nama_pengarang }}</td>
                                                <td>{{ $row->tahun_terbit }}</td>
                                                <td>{{ $row->jumlah_halaman }}</td>
                                                <td>{{ $row->jumlah_buku }}</td>
                                                <td>{{ $row->kategori->nama }}</td>
                                                <td><img src="{{ url('foto_cover/' . $row->foto_cover) }}" width="50px">
                                                </td>
                                                <td><button type="button" class="btn btn-warning btn-sm"
                                                        data-toggle="modal" data-target="#updateBuku{{ $row->id }}">
                                                        Update
                                                    </button>
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
    <div class="modal fade" id="bukuModal" tabindex="-1" aria-labelledby="bukuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Input Tambah Buku</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('buku.store') }}" method="POST"
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
                                        <input type="hidden" name="kode_buku"
                                            value="TBM-{{ $tanggal }}00{{ $nomor_urut }}">
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Nama Pengarang</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama_pengarang" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Tahun Terbit</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="tahun_terbit" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Jumlah Halaman</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="jumlah_halaman" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Jumlah Buku</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="jumlah_buku" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Kategori</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="kategori_id">
                                                    <option selected disabled>Please select</option>
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
    <!-- Modal Update data-->
    @foreach ($buku as $i => $row)
        <div class="modal fade" id="updateBuku{{ $row->id }}" tabindex="-1" aria-labelledby="updateBukuLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <strong>Form Input Update Jumlah Buku</strong>
                            </div>
                            <div class="card-body">
                                <form class="form-sample" action="{{ route('buku.update', $row->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Jumlah Buku</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="jumlah_buku"
                                                        value="{{ $row->jumlah_buku }}">
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
{{-- @section('javascript')
    <script>
        $(document).ready(function() {
            var tableLaporan = $('#table-report').DataTable({});
        });
    </script>
@endsection --}}
