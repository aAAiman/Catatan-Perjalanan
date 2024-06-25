<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Datauser;
use App\Services\LogActivitiesServices\MainLogActivitiesServices;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class UserController extends Controller
//fungsi config.txt (menyimpan data user yang berhasil register dalam config.txt )
{
    public function __construct(MainLogActivitiesServices $logs)
    {
        $this->loging = $logs; // variable name (optional)

    }

    public function index(Request $request)
    {
        // $nik = $request->validate([
        //     'nik' =>'required|exists:user, nik',

        // ]);
        $nik = Auth::user()->id;
        $Datauser = Datauser::where('user_id', $nik)->latest()->paginate(1000);
        return view('sb-user/catatanuser', compact('Datauser'));
    }

    public function tambah()
    {
        return view('sb-user/formtambahuser');
    }

    public function simpan(Request $request)
    {
        //
        $request->validate([
            'user_id' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'suhu_tubuh' => 'required',

        ]);


        Datauser::create([
            'user_id' => $request['user_id'],
            'tanggal' => $request['tanggal'],
            'waktu' => $request['waktu'],
            'lokasi' => $request['lokasi'],
            'suhu_tubuh' => $request['suhu_tubuh'],



        ]);
        $this->loging->activitylog(true, 'Masukkan Data Baru');
        $catatan = new \Dzaki236\LoggingServices\FileServicesConfig('catatan_perjalanan.txt');
        $catatan->fieldInsert(['user_id', 'tanggal', 'waktu', 'lokasi', 'suhu_tubuh'], [$request->user_id, $request->tanggal, $request->waktu, $request->lokasi, $request->suhu_tubuh]);
        return redirect('/catatanuser')->with('status', 'Data Berhasil Ditambah');
    }

    public function riwayat(Request $request)
    {
        $nik = Auth::user()->id;
        $Datauser = Datauser::where('user_id', $nik)->latest()->paginate(1000);
        return view('sb-user/riwayat', compact('Datauser'));
    }

    public function detail($id)
    {
        return view('sb-user.detail', ['Datauser' => Datauser::findorfail($id)]);
    }

    public function pdf($id)
    {
        // $Datauser::all();
        $pdf = PDF::loadview('sb-user.pdf',  ['Datauser' => Datauser::findorfail($id)]);
        return $pdf->stream();
    }

    public function edit($id)
    {
        $user = auth()->user(); // Mengambil pengguna yang sedang diautentikasi
        $catatan = Datauser::find($id); // Mengambil catatan berdasarkan ID

        // Pastikan catatan tersebut milik pengguna yang sedang diautentikasi
        if ($catatan->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Anda tidak diizinkan untuk mengedit catatan ini.');
        }

        return view('sb-user.formedit', compact('catatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'suhu_tubuh' => 'required',
        ]);

        $user = auth()->user(); // Mengambil pengguna yang sedang diautentikasi
        $catatan = Datauser::find($id);

        // Pastikan catatan tersebut milik pengguna yang sedang diautentikasi
        if ($catatan->user_id !== $user->id) {
            return redirect()->back()->with('error', 'Anda tidak diizinkan untuk mengedit catatan ini.');
        }

        $catatan->tanggal = $request->tanggal;
        $catatan->waktu = $request->waktu;
        $catatan->lokasi = $request->lokasi;
        $catatan->suhu_tubuh = $request->suhu_tubuh;
        $catatan->save();

        return redirect('/catatanuser')->with('status', 'Catatan berhasil diubah.');
    }

}
