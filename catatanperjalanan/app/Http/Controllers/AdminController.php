<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Datauser;


class AdminController extends Controller
{
    public function index()
    {
        $Admin = Admin::latest()->paginate(1000);
        return view('sb-admin/catatanadmin', compact('Admin'));
    }

    public function delete(Request $request, $id)
    {
        $Admin = Admin::find($id);
        $Admin->delete();
        return redirect('/catatanadmin')->with('status', 'Data Berhasil Di Hapus');
    }

    public function edit($id)
    {
        $Admin = Admin::where('id', $id)->first();
        return view('sb-admin/formedit', compact('Admin'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'lokasi' => 'required',
            'suhu_tubuh' => 'required',

        ]);
        // dd($request->all());
        // dd($request,$id);
        $Admin = Admin::find($id);
        $Admin->tanggal = $request->tanggal;
        $Admin->waktu = $request->waktu;
        $Admin->lokasi = $request->lokasi;
        $Admin->suhu_tubuh = $request->suhu_tubuh;
        $Admin->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect('/catatanadmin')->with('status', 'Data Berhasil Di Ubah');
    }

    public function dashboard()
    {
        $dashboard = Datauser::latest()->paginate(1000);
        return view('sb-admin/dashboard', compact('dashboard'));
    }
}
