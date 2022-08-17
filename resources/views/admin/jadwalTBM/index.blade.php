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
                        <div class="col-md-2 pull-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#tambahJadwal">
                                Tambah Jadwal
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="display expandable-table" style="width:100%" id="table-report">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pengajar</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i => $row)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ date('l, d F Y', strtotime($row->tanggal)) }}</td>
                                                <td>{{ $row->nama_pengajar }}</td>
                                                <td>{{ $row->mata_pelajaran }}</td>
                                                <td>
                                                    <div class="row">
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#updateJadwal{{ $row->id }}">
                                                            Edit
                                                        </button>
                                                        <form action="{{ route('jadwal.destroy', $row->id) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger btn-sm" type="submit">
                                                                Hapus</button>
                                                        </form>
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
    @foreach ($data as $i => $row)
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
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            var tableLaporan = $('#table-report').DataTable({});
        });
    </script>
@endsection
