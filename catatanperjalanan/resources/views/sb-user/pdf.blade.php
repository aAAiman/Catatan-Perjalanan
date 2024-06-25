<div class="card" style="width: 25 rem;">
        <div class="card-body">
            <h3 class="card-title">Data Perjalanan Anda </h3>
            <hr>
            <p class="font-weight-bold">Nama Lengkap    :   {{ Auth::user()->name }}  </p>
            <p class="font-weight-bold">NIK             :    {{ Auth::user()->nik }}</p>
            </div>
        </div>
        <table class="table table-bordered border-primary" border="2" style="border: 1px solid black">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Suhu Tubuh</th>
                </tr>
            </thead>
            <tbody align="center">
                <tr>
                    @php
                      $no = 1;  
                    @endphp
                    <td>{{$no++}}</td>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{$Datauser->tanggal}}</td>
                    <td>{{$Datauser->waktu}}</td>
                    <td>{{$Datauser->lokasi}}</td>
                    <td>{{$Datauser->suhu_tubuh}}</td>
                </tr>
            </tbody>
        </table>