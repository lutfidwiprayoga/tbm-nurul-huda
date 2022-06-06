@extends('admin.layouts.master')

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body card-block">
                    <div class="card-header">
                        <strong>{{ $pagename }}</strong>
                    </div>
                    <div class="card-body card-block">

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

                        <form action="{{ route('jadwal.update', $data->id) }}" method="post" enctype="multipart/form-data"
                            class="form-horizontal">
                            @method('PATCH')
                            @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label">Tanggal</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="tanggal"
                                        value="{{ $data->tanggal }}" placeholder="Teks" class="form-control"><small
                                        class="form-text text-muted">Ini adalah teks
                                        bantuan</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label">Nama_Pengajar</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="nama_pengajar"
                                        value="{{ $data->nama_pengajar }}" placeholder="Teks"
                                        class="form-control"><small class="form-text text-muted">Ini adalah teks
                                        bantuan</small></div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text-input"
                                        class=" form-control-label">Mata_Pelajaran</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="text-input" name="mata_pelajaran"
                                        value="{{ $data->mata_pelajaran }}" placeholder="Teks"
                                        class="form-control"><small class="form-text text-muted">Ini adalah teks
                                        bantuan</small></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Update
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                    </div>

                    </form>
                </div>
            </div>

        </div><!-- .animated -->
    </div>
@endsection
