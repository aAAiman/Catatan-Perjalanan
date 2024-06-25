@extends('layouts.app')

@section('content')

<body class="bg-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-lg-block bg-register-image">
                        <img src="{{asset('vendor/sb-admin/img/logoligin.jpg')}}" class="img-fluid w-100 mt-5" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user  @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Masukkan Nama Anda">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form"><label for="vat" class=" form-control-label">Gambar</label>
                                    <input type="file" id="gambar" name="gambar"
                                        class="form-control" value="">
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="number"
                                        class="form-control form-control-user  @error('nik') is-invalid @enderror"
                                        name="nik" value="{{ old('nik') }}" required autocomplete="nik" id="nik"
                                        placeholder="NIK">

                                    @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password"
                                            id="exampleInputPassword" placeholder="Password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="password_confirmation" id="exampleRepeatPassword"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group row mb-0 btn-btn-block">
                                    <div class="col-md-12 rounded-circle">
                                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                                <hr>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection
