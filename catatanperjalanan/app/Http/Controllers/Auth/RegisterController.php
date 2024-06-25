<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\LogActivitiesServices\MainLogActivitiesServices;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MainLogActivitiesServices $log)
    {
        $this->middleware('guest');
        $this->logging = $log;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'gambar' => ['required'],
            'nik' => ['required', 'unique:users,nik'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        // if($data['gambar']){

        // }
        $foto = $data['gambar'];
        $namafile = time() . $foto->getClientOriginalName();
        $tujuanupload = "fotouser";
        $foto->move($tujuanupload, $namafile);
        $users = User::create([
            'name' => $data['name'],
            'nik' => $data['nik'],
            'gambar' => $namafile,
            'password' => Hash::make($data['password']),
        ]);
        $users->save();
        $this->logging->activityLog(true, 'Masukkan User Baru');
        $config = new \Dzaki236\LoggingServices\FileServicesConfig('config.txt');
        $config->fieldInsert(array('id', 'name', 'nik'), array($users->id, $users->name, $users->nik));
        return $users;
    }
}
