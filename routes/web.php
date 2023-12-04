<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

//Route untuk Data Obat
Route::get('/obat', 'ObatController@obattampil');
Route::post('/obat/tambah','ObatController@obattambah');
Route::get('/obat/hapus/{id_obat}','ObatController@obathapus');
Route::put('/obat/edit/{id_obat}', 'ObatController@obatedit');

Route::get('/home', function(){return view('view_home');});

//Route untuk data pasien
Route::get('/pasien', 'PasienController@pasientampil');
Route::post('/pasien/tambah','PasienController@pasientambah');
Route::get('/pasien/hapus/{id_pasien}','PasienController@pasienhapus');
Route::put('/pasien/edit/{id_pasien}', 'PasienController@pasienedit');

//Route untuk data perawat
Route::get('/perawat', 'PerawatController@perawattampil');
Route::post('/perawat/tambah','PerawatController@perawattambah');
Route::get('/perawat/hapus/{id_perawat}','PerawatController@perawathapus');
Route::put('/perawat/edit/{id_perawat}', 'PerawatController@perawatedit');

//Route untuk data perawat
Route::get('/janji', 'JanjiController@janjitampil');
Route::post('/janji/tambah','JanjiController@janjitambah');
Route::get('/janji/hapus/{id_janji}','JanjiController@janjihapus');
Route::put('/janji/edit/{id_janji}', 'JanjiController@janjiedit');

Route::get('/pasien', 'PasienController@pasientampil');

Route::get('/perawat', 'PerawatController@perawattampil');

Route::get('/janji', 'JanjiController@janjitampil');
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//auth route
Route::view('login','auth')->name('login');
Route::post('/login',[App\Http\Controllers\Auth\LoginController::class,'Login'])->name('user.login');
Route::post('logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

//root page
Route::view('/','livewire.landing-page');
//dashboard
Route::view('/dashboard','dashboard')->middleware(['auth']);
//form daftar
Route::view('/daftarperiksa','livewire.daftar')->middleware(['auth','user']);
//profil
Route::view('/profil','profil')->middleware(['auth','user']);
//obat admin
Route::view('/admin/obat','obatadmin')->middleware(['auth','admin']);
//dokter admin
Route::view('/admin/dokter','dokteradmin')->middleware(['auth','admin']);
//lihat pasien
Route::view('/admin/lihatpasien','daftarPasien')->middleware(['auth','admin']);
//perawat:daftar pasien
Route::view('/perawat/daftarpasien','pasienPerawat')->middleware(['auth','perawat']);
//perawat:jadwal dokter
Route::view('/perawat/jadwaldokter','jadwaldokter')->middleware(['auth','perawat']);