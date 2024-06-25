@extends('sb-admin/app')

@section('content')

@section('judul','Form Edit Data User')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@yield('judul')</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
          class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<div class="container">
    @if (session('status'))
    <div class="alert alert-primary">{{session('status')}}</div>
    @endif
</div>


<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Form Edit Data User</h6>
                    </div>
                    <form action="/update{{$Admin->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">Username</p>
                                </div>
                            </div> --}}
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="user_id" name="user_id" placeholder="name"
                                value=" {{ Auth::user()->id }}">
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input"
                                    class=" form-control-label ml-3">Tanggal</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="tanggal" name="tanggal"
                                    placeholder="Text" class="form-control" value="{{old('tanggal',$Admin->tanggal)}}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input"
                                    class=" form-control-label ml-3">Jam</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="waktu" name="waktu" class="form-control"
                                    value="{{old('waktu',$Admin->waktu)}}"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label ml-3">Lokasi
                                    Yang Dituju</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="lokasi" name="lokasi"
                                    class="form-control" value="{{old('lokasi',$Admin->lokasi)}}"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label ml-3">Suhu
                                    Tubuh</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="suhu_tubuh" name="suhu_tubuh"
                                    class="form-control" value="{{old('lokasi',$Admin->suhu_tubuh)}}"></div>
                        </div>


                        {{-- <div class="card-footer"> --}}
                            <button type="submit" class="btn btn-primary btn-sm mb-3 ml-3">
                                <i class="fa-solid fa-square-s"></i> Submit
                            </button>
                            {{-- <button type="reset" class="btn btn-danger btn-sm mb-3 ml-3">
                                <i class="fa fa-ban"></i> Reset
                            </button> --}}
                    </form>
                </div>
                    @endsection
