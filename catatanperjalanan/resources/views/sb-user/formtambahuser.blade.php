@extends('sb-user/app')

@section('content')

@section('judul','Form Data Perjalanan')

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
                        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data</h6>
                    </div>
                    <form action="{{route('simpan')}}" method="POST">
                        @csrf
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
                                    placeholder="Text" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input"
                                    class=" form-control-label ml-3">Jam</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="waktu" name="waktu"
                                    class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label ml-3">Lokasi
                                    Yang Dituju</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="lokasi" name="lokasi"
                                    class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label ml-3">Suhu
                                    Tubuh</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="suhu_tubuh" name="suhu_tubuh"
                                    class="form-control"></div>
                        </div>


                        <button type="submit" class="btn btn-primary btn-sm ml-3 mb-5">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                      
                    </form>
                </div>
                    @endsection
