<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('login');
});
Auth::routes();
//admin
Route::resource('login', LoginController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/catatanadmin', function () {
    return view('sb-admin/catatanadmin');
})->name('catatanadmin');
Route::get('admin', function () {
    return view('sb-admin/dashboard');
})->middleware('checkRole:admin');
Route::get('/dashboard', function () {
    return view('sb-admin/dashboard');
})->name('dashboard');
Route::get('/catatanadmin', [App\Http\Controllers\AdminController::class, 'index'])->name('catatanadmin');
Route::delete('/delete{id}', [App\Http\Controllers\AdminController::class, 'delete']);
Route::get('/editdata{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('editdata');
Route::put('/update{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('update');
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

//user
Route::get('/catatanuser', function () {
    return view('sb-user/catatanuser');
})->name('catatanuser');
Route::get('user', function () {
    return view('sb-user/user');
})->middleware(['checkRole:user,admin'])->name('user');
Route::get('/formtambahuser', function () {
    return view('sb-user/formtambahuser');
})->name('formtambahuser');
Route::get('/catatanuser', [App\Http\Controllers\UserController::class, 'index'])->name('catatan');
Route::post('/simpan', [UserController::class, 'simpan'])->name('simpan');
Route::get('/editdata{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('editdata');
Route::get('/riwayat', [App\Http\Controllers\UserController::class, 'riwayat'])->name('riwayat');
Route::put('/update{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');
Route::get('/detail{id}', [App\Http\Controllers\UserController::class, 'detail'])->name('detail');
Route::get('sb-user/pdf/{Datauser}', [App\Http\Controllers\UserController::class, 'pdf'])->name('pdf');
