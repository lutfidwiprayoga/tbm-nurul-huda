@extends('admin.layouts.master')

@section('main')
    <div class="row">
        <div class="col-4 grid-margin">
            <div class="card">
                <div class="card-header">
                    <strong>Form Input Data Buku</strong>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <div class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item">
                                        {{ $error }}
                                    </li>
                                @endforeach

                            </div>
                        </div>
                    @endif
                    <form class="form-sample" action="{{ route('jadwal.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="tanggal">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Pengajar</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_pengajar">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Mata Pelajaran</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="mata_pelajaran">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('jadwal.index') }}" type="button" class="btn btn-light btn-sm">
                            <i class="fa fa-ban"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
