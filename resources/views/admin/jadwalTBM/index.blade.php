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
                            <p class="card-title">Jadwal Mengajar</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#tambahJadwal">
                                Tambah Jadwal
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div class="row" style="float: right">
                                    <div class="col-md-12">
                                        <form action="{{ route('jadwal.index') }}" method="GET">
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
                                            <th>Tanggal</th>
                                            <th>Nama Pengajar</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Jam Mengajar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwal as $i => $row)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ date('l, d F Y', strtotime($row->tanggal)) }}</td>
                                                <td>{{ $row->nama_pengajar }}</td>
                                                <td>{{ $row->mata_pelajaran }}</td>
                                                <td>{{ date('H:i', strtotime($row->jam)) }} WIB</td>
                                                <td>
                                                    <div class="row">
                                                        <button type="button"
                                                            class="btn btn-inverse-warning btn-icon btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#updateJadwal{{ $row->id }}">
                                                            <i class="ti-pencil-alt"></i>
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-inverse-danger btn-icon btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#deleteJadwal{{ $row->id }}">
                                                            <i class="ti-trash"></i>
                                                        </button>
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
    <!-- Modal Tambah data-->
    <div class="modal fade" id="tambahJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Input Jadwal Pengajar</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('jadwal.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Tanggal</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="tanggal">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Nama Pengajar</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama_pengajar">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Mata Pelajaran</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="mata_pelajaran">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Jam Mengajar</label>
                                            <div class="col-sm-8">
                                                <input type="time" class="form-control" name="jam">
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
    @foreach ($jadwal as $i => $row)
        <div class="modal fade" id="updateJadwal{{ $row->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <strong>Form Update Jadwal Pengajar</strong>
                            </div>
                            <div class="card-body">
                                <form class="form-sample" action="{{ route('jadwal.update', $row->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Tanggal</label>
                                                <div class="col-sm-8">
                                                    <input type="date" class="form-control" name="tanggal"
                                                        value="{{ $row->tanggal }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Jam Mengajar</label>
                                                <div class="col-sm-8">
                                                    <input type="time" class="form-control" name="jam"
                                                        value="{{ $row->jam }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Nama Pengajar</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nama_pengajar"
                                                        value="{{ $row->nama_pengajar }}">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Mata Pelajaran</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="mata_pelajaran"
                                                        value="{{ $row->mata_pelajaran }}">
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
    <!-- Modal Delete Data -->
    @foreach ($jadwal as $row)
        <div class="modal fade" id="deleteJadwal{{ $row->id }}">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content bg-default">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">Hapus Data</div>
                            <div class="card-body">
                                <form action="{{ route('jadwal.destroy', $row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Apakah anda Yakin Menghapus Data Mengajar {{ $row->nama_pengajar }}?&hellip;
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mt-3"style="justify-content: center">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-danger">Ya,
                                            Hapus</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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
