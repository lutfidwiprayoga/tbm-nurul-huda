@extends('admin.layouts.master')

@section('main')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <strong>Form Input Data Buku</strong>
                </div>
                <div class="card-body">
                    <form class="form-sample" action="{{ route('buku.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Judul Buku</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="judul_buku">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Pengarang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_pengarang">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tahun Terbit</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="tahun_terbit">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jumlah Halaman</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jumlah_halaman">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jumlah Buku</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jumlah_buku">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Buku</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jenis_buku">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="kategori">
                                            <option selected disabled>Please select</option>
                                            <option value="1">Novel</option>
                                            <option value="2">Komik</option>
                                            <option value="3">Pelajaran</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Foto Cover</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-sm btn-primary" type="button">Upload</button>
                                            </div>
                                            <input type="file" class="form-control" name="foto_cover">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('buku.index') }}" type="button" class="btn btn-light btn-sm">
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
