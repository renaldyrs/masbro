<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\JurnalController;

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

Route::get('/welcome', function () {
    return view('welcome');
});
//auth
Route::get('/1', [HomeController::class, 'index']);
Auth::routes();




//Login Register
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//halaman admin
Route::get('halaman-admin', 'App\HTTP\Controllers\AdminController@haladmin')
    ->name('haladmin')->middleware('checkRole');

Route::get('laporan', 'App\HTTP\Controllers\AdminController@laporan')
    ->name('laporan');
Route::get('cetak','App\HTTP\Controllers\AdminController@cetak');
//pelanggan
Route::get('data-pelanggan', 'App\HTTP\Controllers\AdminController@datapelanggan');
Route::post('tambah-pelanggan', 'App\HTTP\Controllers\AdminController@tambahpelanggan');
Route::get('hapus-pelanggan/{id}', 'App\HTTP\Controllers\AdminController@hapuspel');
Route::get('edit-pelanggan/{id}', 'App\HTTP\Controllers\AdminController@editpel');
Route::post('update-pelanggan', 'App\HTTP\Controllers\AdminController@updatepel');
//jenis
Route::get('data-jenis', 'App\HTTP\Controllers\AdminController@datajenis');
Route::post('tambah-jenis', 'App\HTTP\Controllers\AdminController@tambahjenis');
Route::get('hapus-jenis/{id}', 'App\HTTP\Controllers\AdminController@hapusjenis');
Route::get('edit-jenis/{id}', 'App\HTTP\Controllers\AdminController@editjenis');
Route::post('update-jenis', 'App\HTTP\Controllers\AdminController@updatejenis');
//beban
Route::get('data-beban', 'App\HTTP\Controllers\AdminController@databeban');
Route::post('/data-beban/tambah', 'App\HTTP\Controllers\AdminController@tambahbeban');
Route::get('/data-beban/hapus/{id}', 'App\HTTP\Controllers\AdminController@hapusbeban');
Route::get('/data-beban/edit/{id}', 'App\HTTP\Controllers\AdminController@editbeban');
Route::post('/data-beban/update', 'App\HTTP\Controllers\AdminController@updatebeban');
//metode
Route::get('data-metode', 'App\HTTP\Controllers\AdminController@datametode');
Route::post('tambah-metode', 'App\HTTP\Controllers\AdminController@tambahmetode');
Route::get('hapus-metode/{id}', 'App\HTTP\Controllers\AdminController@hapusmetode');
Route::get('edit-metode/{id}', 'App\HTTP\Controllers\AdminController@editmetode');
Route::post('update-metode', 'App\HTTP\Controllers\AdminController@updatemetode');
//pesanan
Route::get('pesanan', 'App\HTTP\Controllers\PesananController@halpesanan');
Route::post('tambah-pesanan', 'App\HTTP\Controllers\PesananController@tambahpesanan');
Route::get('hapus-pesanan/{id}', 'App\HTTP\Controllers\PesananController@hapuspesanan');
Route::get('edit-pesanan/{id}', 'App\HTTP\Controllers\PesananController@editpesanan');
Route::post('update-pesanan', 'App\HTTP\Controllers\PesananController@updatestatus');
Route::get('getharga', 'App\HTTP\Controllers\PesananController@getharga');
// halaman pemilik
Route::get('halaman-pemilik', 'App\HTTP\Controllers\PemilikController@halpemilik')->name('halpemilik');

Route::get('data-akun', 'App\HTTP\Controllers\PemilikController@dataakun')->name('dataakun');

Route::post('tambah-akun', 'App\HTTP\Controllers\PemilikController@tambahakun')->name('tambahakun');

//Jurnal
Route::get('jurnal-umum', 'App\HTTP\Controllers\JurnalController@haljurnal')->name('haljurnal');
Route::get('tambah-jurnal', 'App\HTTP\Controllers\JurnalController@tambahjurnal')->name('tambahjurnal');
Route::post('simpan-jurnal', 'App\HTTP\Controllers\JurnalController@simpanjurnal')->name('simpanjurnal');
Route::get('jurnal-umum/detail/{waktu}', 'App\HTTP\Controllers\JurnalController@detailjurnal')->name('detailjurnal');
// halaman utama

Route::get('/halaman-utama', 'App\HTTP\Controllers\utamacontroller@halutama');
// Halaman Data
// Data Pelanggan



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
