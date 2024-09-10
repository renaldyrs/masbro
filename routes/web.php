<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NeracaController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KirimController;

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

Route::get('halaman-pemilik', [PemilikController::class, 'halpemilik'])
->name('halpemilik');

Route::get('halaman-kirim', [KirimController::class, 'halkirim'])
->name('halkirim');

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
Route::get('getakunbeban', [AdminController::class,'getakunbeban']);

//metode
Route::get('data-metode', 'App\HTTP\Controllers\AdminController@datametode');
Route::post('tambah-metode', 'App\HTTP\Controllers\AdminController@tambahmetode');
Route::get('hapus-metode/{id}', 'App\HTTP\Controllers\AdminController@hapusmetode');
Route::get('edit-metode/{id}', 'App\HTTP\Controllers\AdminController@editmetode');
Route::post('update-metode', 'App\HTTP\Controllers\AdminController@updatemetode');

//pesanan
Route::get('pesanan', [PesananController::class,'halpesanan']);
Route::get('pesanan-selesai', [PesananController::class,'halpesananselesai']);
Route::post('tambah-pesanan', [PesananController::class,'tambahpesanan']);
Route::get('hapus-pesanan/{kode_pesanan}', [PesananController::class, 'hapuspesanan']);
Route::get('edit-pesanan/{id}', [PesananController::class, 'editpesanan']);
Route::get('update-pesanan/{kode_pesanan}', [PesananController::class, 'updatestatus']);
Route::get('updatekirim/{kode_pesanan}', [PesananController::class, 'updatekirim']);
Route::get('selesailaundry/{kode_pesanan}', [PesananController::class, 'selesailaundry']);
Route::get('getharga', [PesananController::class,'getharga']);
Route::get('getmetode/{jenis}', [PesananController::class,'getmetode']);
Route::get('getkodebank', [PesananController::class,'getkodebank']);
Route::get('ambillaundry/{kode_pesanan}', [PesananController::class, 'ambillaundry']);

//kirim
Route::post('kirim', [KirimController::class, 'kirim']);
Route::get('selesaikirim/{id}', [KirimController::class, 'selesaikirim']);
Route::get('sudahdiambil/{id}', [KirimController::class, 'sudahdiambil']);

// halaman akun

Route::get('data-akun', [PemilikController::class, 'dataakun']);
Route::post('tambah-akun', [PemilikController::class, 'tambahakun']);
Route::get('edit-akun/{id}', [PemilikController::class, 'editakun']);
Route::post('update-akun', [PemilikController::class, 'updateakun']);
Route::get('hapus-akun/{id}', [PemilikController::class, 'hapusakun']);

//Jurnal
Route::get('jurnal-umum', [JurnalController::class, 'haljurnal'])->name('haljurnal');
Route::get('tambah-jurnal', [JurnalController::class, 'tambahjurnal']);
Route::get('jurnal-detail/hapus/{id}', [JurnalController::class, 'hapusjurnal']);
Route::post('simpan-jurnal', [JurnalController::class,'simpanjurnal']);
Route::get('jurnal-detail/{waktu}', [JurnalController::class,'detailjurnal']);

//bukuBesar
Route::get('buku-besar', [BukuController::class, 'halbukubesar']);
Route::get('buku-besar/{id}',[BukuController::class, 'akunbukubesar']);
Route::get('buku-besar/{id}/{waktu}', [BukuController::class, 'detailbukubesar']);

//neracasaldo
Route::get('neraca-saldo', [NeracaController::class, 'halneracasaldo']);
Route::get('neraca-detail/{waktu}',[NeracaController::class, 'neracadetail']);
Route::get('neraca-saldo/cetak/{waktu}', [NeracaController::class,'cetakneraca']);


Route::get('laporan-laba-rugi', [LaporanController::class, 'showLaporan']);
Route::get('laporan/cetak/{waktu}', [LaporanController::class, 'cetakLaporan']);

Route::get('/halaman-utama', 'App\HTTP\Controllers\utamacontroller@halutama');
// Halaman Data
// Data Pelanggan



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
