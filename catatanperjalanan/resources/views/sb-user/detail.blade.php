@extends('sb-user/app')

@section('content')

@section('judul','Detail Perjalanan')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@yield('judul')</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
          class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<div class="card" style="width: 25 rem;">
        <div class="card-body">
            <p class="card-title">Detail Perjalanan Anda</p>
            <hr>
            <h5 class="font-weight-bold">Nama Lengkap    :   {{ Auth::user()->name }}  </h5>
            <h5 class="font-weight-bold">NIK             :    {{ Auth::user()->nik }}</h5>
            <h5 class="font-weight-bold">Tanggal    :    {{$Datauser->tanggal}}</h5>
            <h5 class="font-weight-bold">waktu    :    {{$Datauser->waktu}}</h5>
            <h5 class="font-weight-bold">Lokasi    :    {{$Datauser->lokasi}}</h5>
            <h5 class="font-weight-bold">Suhu Tubuh    :    {{$Datauser->suhu_tubuh}}</h5>
            </div>
        </div>
        <a href="/sb-user/pdf/{{$Datauser->id}}" target="_blank" class="btn btn-primary btn-sm mb-3 mt-3 font-weight-bold">Cetak PDF</a>
        





@endsection
@push('script')
<script>
    $("#dataTable").DataTable();

</script>
@endpush
