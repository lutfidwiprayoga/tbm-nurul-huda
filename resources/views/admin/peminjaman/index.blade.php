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
                            <p class="card-title">Peminjaman Buku</p>
                        </div>
                        <div class="col-md-2 pull-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#pinjamBuku">
                                Pinjam Buku
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
                                            <th>Nama Peminjam</th>
                                            <th>Judul Buku</th>
                                            <th>Foto Cover</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman as $i => $row)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $row->murid->nama }}</td>
                                                <td>{{ $row->bukus->judul_buku }}</td>
                                                <td><img src="{{ url('foto_cover/' . $row->bukus->foto_cover) }}"
                                                        width="50px">
                                                </td>
                                                <td>{{ date('l d M Y H:i:s', strtotime($row->tanggal_pinjam)) }}</td>
                                                @if ($row->tanggal_kembali == null)
                                                    <td>
                                                        <div class="badge badge-info">Belum Dikembalikan</div>
                                                    </td>
                                                @else
                                                    <td>{{ date('l d M Y H:i:s', strtotime($row->tanggal_kembali)) }}</td>
                                                @endif
                                                @if ($row->status == 'Dipinjam')
                                                    <td>
                                                        <div class="badge badge-warning">{{ $row->status }}</div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="badge badge-success">{{ $row->status }}</div>
                                                    </td>
                                                @endif
                                                <td>{{ $row->keterangan }}</td>
                                                @if ($row->tanggal_kembali == null)
                                                    <td>
                                                        <form action="{{ route('pinjambuku.kembali', $row->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Kembali</button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td></td>
                                                @endif
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
    <div class="modal fade" id="pinjamBuku" tabindex="-1" aria-labelledby="bukuModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <strong>Form Input Pinjam Buku</strong>
                        </div>
                        <div class="card-body">
                            <form class="form-sample" action="{{ route('pinjambuku.pinjam') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Nama Peminjam</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="murid_id">
                                                    <option selected disabled>Please select</option>
                                                    @foreach ($murid as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Judul Buku</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="buku_id">
                                                    <option selected disabled>Please select</option>
                                                    @foreach ($buku as $data)
                                                        <option value="{{ $data->id }}">{{ $data->judul_buku }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Tanggal Pinjam</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="tanggal_pinjam" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <label class="col-sm-4 col-form-label">Keterangan</label>
                                            <div class="col-sm-8">
                                                <textarea type="text" class="form-control" name="keterangan" required></textarea>
                                            </div>
                                        </div>
                                        <input type="hidden" name="jumlah_pinjam" value="1">
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
@endsection
@section('javascript')
    <script>
        $(document).ready(function() {
            var tableLaporan = $('#table-report').DataTable({});
        });
    </script>
@endsection
