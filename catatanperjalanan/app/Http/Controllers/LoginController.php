<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return "test";
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $data = User::where('nik',$request->nik)->first();
        // dd($data);
        if ($data != NULL) {
            if (password_verify($request->password,$data->password)) {
                # code...
                $credentials = [
                    'nik' => $request->nik,
                    'password' => $data->password,
                ];
                // dd($credentials);
                // dd(Auth::attempt();
                if (Auth::attempt($request->only('nik', 'password'))) {
                    # code...
                    return redirect('/home');
                }
            }
            # code...
        }
    }
}
