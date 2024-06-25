@extends('sb-user/app')

@section('content')

@section('judul','Form Edit Data User')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@yield('judul')</h1>
</div>

<div class="container">
    @if (session('status'))
    <div class="alert alert-primary">{{session('status')}}</div>
    @endif
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Form Edit Data User</h6>
                    </div>
                    <form action="{{ route('update', $catatan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="tanggal" class="form-control-label ml-3">Tanggal</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', $catatan->tanggal) }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="waktu" class="form-control-label ml-3">Jam</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="waktu" name="waktu" class="form-control" value="{{ old('waktu', $catatan->waktu) }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="lokasi" class="form-control-label ml-3">Lokasi Yang Dituju</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="lokasi" name="lokasi" class="form-control" value="{{ old('lokasi', $catatan->lokasi) }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="suhu_tubuh" class="form-control-label ml-3">Suhu Tubuh</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" step="0.1" id="suhu_tubuh" name="suhu_tubuh" class="form-control" value="{{ old('suhu_tubuh', $catatan->suhu_tubuh) }}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mb-3 ml-3">
                            <i class="fa-solid fa-save"></i> Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
