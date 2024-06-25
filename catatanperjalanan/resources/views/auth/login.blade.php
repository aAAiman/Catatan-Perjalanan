@extends('layouts.app')

@section('content')


<body class="bg-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-lg-block bg-login-image bg-position">
                                <img src="{{asset('vendor/sb-admin/img/logoligin.jpg')}}" class="img-fluid w-100 mt-5" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome !</h1>
                                    </div>
                                    <form method="post" action="{{route('login.store')}}" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user"
                                                id="exampleInputEmail" name="nik" aria-describedby="emailHelp"
                                                placeholder="Enter Your Nik...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        {{-- <a href="{{route('login.index')}}" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> --}}
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>

                                          <a href="{{route('register')}}" class="btn btn-danger btn-user btn-block">
                                            Register
                                        </a>
                                    </form>
                                    <hr>
                                   
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        @endsection
