@extends('sb-user/app')

@section('content')

@section('judul','Data Perjalanan Anda')

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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Catatan Perjalanan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Suhu Tubuh</th>                        
                        <th scope="col">Action</th>                        
                    </tr>
                </thead>
                <tfoot>


                </tfoot>
                <tbody>
                    @foreach ($Datauser as $no => $Datauser)
                    <tr>
                        <th scope="col">{{$loop->iteration}}</th>
                        <td>{{$Datauser->user->name}}</td>
                        <td>{{$Datauser->tanggal}}</td>
                        <td>{{$Datauser->waktu}}</td>
                        <td>{{$Datauser->lokasi}}</td>
                        <td>{{$Datauser->suhu_tubuh}}</td>
                        <td>
                            <a href="{{ route('editdata', $Datauser->id) }}" class="btn btn-block btn-primary btn-sm mb-2 mt-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('detail', $Datauser->id) }}" class="btn btn-block btn-primary btn-sm mb-2 mt-2">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $("#dataTable").DataTable();

</script>
@endpush
