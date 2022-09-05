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
                            <p class="card-title">Data Murid</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#muridModal">
                                Tambah Murid
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div class="row" style="float: right">
                                    <div class="col-md-12">
                                        <form action="{{ route('murid.index') }}" method="GET">
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-3 col-form-label">Cari</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="cari_murid" class="form-control">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="display expandable-table" style="width:100%" id="table-report">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Umur</th>
                                            <th>Sekolah</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($murid as $i => $row)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->alamat }}</td>
                                                <td>{{ date('d F Y', strtotime($row->tanggal_lahir)) }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row->tanggal_lahir)->diffInYears() }}
                                                    Tahun
                                                </td>
                                                <td>{{ $row->sekolah }}</td>
                                                <td>
                                                    @if ($row->status == 'Aktif')
                                                        <button class="btn btn-inverse-success btn-sm"
                                                            data-target="#ubahStatus{{ $row->id }}"
                                                            data-toggle="modal">{{ $row->status }}</button>
                                                    @else
                                                        <button class="btn btn-inverse-danger btn-sm"
                                                            data-target="#ubahStatus{{ $row->id }}"
                                                            data-toggle="modal">{{ $row->status }}</button>
                                                    @endif
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
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <p class="card-title">Data Pengajar</p>
                        </div>
                        <div class="col-md-2 text-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#pengajarModal">
                                Tambah Pengajar
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <div class="row" style="float: right">
                                    <div class="col-md-12">
                                        <form action="{{ route('murid.index') }}" method="GET">
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-3 col-form-label">Cari</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="cari_pengajar" class="form-control">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="display expandable-table" style="width:100%" id="table-report">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengajar as $i => $row)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $row->nama }}</td>
                                                <td>{{ $row->alamat }}</td>
                                                <td>{{ $row->no_hp }}</td>
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
    <!-- Modal Tambah data Murid-->
    <div class="modal fade" id="muridModal" tabindex="-1" aria-labelledby="muridModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Input Tambah Data Murid</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('murid.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Nama Murid</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="alamat" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="tanggal_lahir" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Sekolah</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="sekolah" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="status" value="Aktif">
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
    <!-- Modal Tambah data Pengajar-->
    <div class="modal fade" id="pengajarModal" tabindex="-1" aria-labelledby="muridModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Input Tambah Data Murid</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('pengajar.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Nama Pengajar</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="alamat" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">No HP</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="no_hp" required>
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
    <!-- Modal Update Status -->
    @foreach ($murid as $row)
        <div class="modal fade" id="ubahStatus{{ $row->id }}" tabindex="-1" aria-labelledby="muridModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-header">
                                <strong>Form Input Tambah Data Murid</strong>
                            </div>
                            <div class="card-body">
                                <form class="form-sample" action="{{ route('murid.update', $row->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-0">
                                                <label class="col-sm-4 col-form-label">Status Murid</label>
                                                <div class="col-sm-8">
                                                    <select name="status" class="form-control">
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                                    </select>
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
    <script>
        $(document).ready(function() {
            var table = $('#table-report').DataTable();
            $("#table-report tfoot tr th").each(function(i) {
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(this).empty())
                    .on('change', function() {
                        var val = $(this).val();
                        table.column(i)
                            .search(val ? '^' + $(this).val() + '$' :
                                val, true, false)
                            .draw();
                    });
                table.column(i).data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        });
    </script>
@endsection --}}
