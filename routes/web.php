<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BebanController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\NeracaController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PesananController;
use App\Models\Akun;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KirimController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MetodeController;
use App\Http\Controllers\AkunController;


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
Route::get('/', [AuthController::class, 'index'])
    ->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])
    ->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])
    ->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])
    ->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//halaman admin
Route::get('halaman-pemilik', 'App\HTTP\Controllers\AdminController@haladmin')
    ->name('haladmin')->middleware('checkRole');

Route::get('halaman-pemilik', [PemilikController::class, 'halpemilik'])
    ->name('halpemilik')->middleware('checkRole');

Route::get('halaman-kirim', [KirimController::class, 'halkirim'])
    ->name('halkirim');

Route::get('laporan', 'App\HTTP\Controllers\AdminController@laporan')
    ->name('laporan');
Route::get('cetak', 'App\HTTP\Controllers\AdminController@cetak');

//pelanggan
Route::get('data-pelanggan', [PelangganController::class, 'pelanggan']);
Route::post('tambah-pelanggan', [PelangganController::class, 'tambahpel']);
Route::get('hapus-pelanggan/{id}', [PelangganController::class, 'hapuspel']);
Route::get('edit-pelanggan/{id}', [PelangganController::class, 'editpel']);
Route::post('update-pelanggan', [PelangganController::class, 'updatepel']);

//jenis
Route::get('data-jenis', [JenisController::class, 'jenis']);
Route::post('tambah-jenis', [JenisController::class, 'tambahjenis']);
Route::get('hapus-jenis/{id}', [JenisController::class, 'hapusjenis']);
Route::get('edit-jenis/{id}', [JenisController::class, 'editjenis']);
Route::post('update-jenis', [JenisController::class, 'updatejenis']);

//beban
Route::get('data-beban', [BebanController::class, 'beban']);
Route::post('/data-beban/tambah', [BebanController::class, 'tambahbeban']);
Route::get('/data-beban/hapus/{id}', [BebanController::class, 'hapusbeban']);
Route::get('/data-beban/edit/{id}', [BebanController::class, 'editbeban']);
Route::post('/data-beban/update', [BebanController::class, 'updatebeban']);
Route::get('getakunbeban', [BebanController::class, 'getakunbeban']);

//metode
Route::get('data-metode', [MetodeController::class, 'metode']);
Route::post('tambah-metode', [MetodeController::class, 'tambahmetode']);
Route::get('hapus-metode/{id}', [MetodeController::class, 'hapusmetode']);
Route::get('edit-metode/{id}', [MetodeController::class, 'editmetode']);
Route::post('update-metode', [MetodeController::class, 'updatemetode']);

//pesanan
Route::get('pesanan', [PesananController::class, 'halpesanan']);
Route::get('pesanan-selesai', [PesananController::class, 'halpesananselesai']);
Route::post('tambah-pesanan', [PesananController::class, 'tambahpesanan']);
Route::get('hapus-pesanan/{kode_pesanan}', [PesananController::class, 'hapuspesanan']);
Route::get('edit-pesanan/{id}', [PesananController::class, 'editpesanan']);
Route::get('update-pesanan/{kode_pesanan}', [PesananController::class, 'updatestatus']);
Route::get('updatekirim/{kode_pesanan}', [PesananController::class, 'updatekirim']);
Route::get('selesailaundry/{kode_pesanan}', [PesananController::class, 'selesailaundry']);
Route::get('getharga', [PesananController::class, 'getharga']);
Route::get('getmetode/{jenis}', [PesananController::class, 'getmetode']);
Route::get('getkodebank', [PesananController::class, 'getkodebank']);
Route::get('ambillaundry/{kode_pesanan}', [PesananController::class, 'ambillaundry']);

//kirim
Route::post('kirim', [KirimController::class, 'kirim']);
Route::get('selesaikirim/{id}', [KirimController::class, 'selesaikirim']);
Route::get('sudahdiambil/{id}', [KirimController::class, 'sudahdiambil']);

// halaman akun

Route::get('data-akun', [AkunController::class, 'akun']);
Route::post('tambah-akun', [AkunController::class, 'tambahakun']);
Route::get('edit-akun/{id}', [AkunController::class, 'editakun']);
Route::post('update-akun', [AkunController::class, 'updateakun']);
Route::get('hapus-akun/{id}', [AkunController::class, 'hapusakun']);

//Jurnal
Route::get('jurnal-umum', [JurnalController::class, 'haljurnal'])->name('haljurnal');
Route::get('tambah-jurnal', [JurnalController::class, 'tambahjurnal']);
Route::get('jurnal-detail/hapus/{id}', [JurnalController::class, 'hapusjurnal']);
Route::post('simpan-jurnal', [JurnalController::class, 'simpanjurnal']);
Route::get('jurnal-detail/{waktu}', [JurnalController::class, 'detailjurnal']);

//bukuBesar
Route::get('buku-besar', [BukuController::class, 'halbukubesar']);
Route::get('buku-besar/periode/{bulan}', [BukuController::class, 'periodebukubesar']);
Route::get('buku-besar/periode/{bulan}/{id}', [BukuController::class, 'periodedetail']);

Route::get('buku-besar/akun/{id}', 'App\HTTP\Controllers\BukuController@akunbukubesar');
Route::get('buku-besar/akun/{id}/{waktu}', [BukuController::class, 'detailbukubesar']);

//neracasaldo
Route::get('neraca-saldo', [NeracaController::class, 'halneracasaldo']);
Route::get('neraca-detail/{waktu}', [NeracaController::class, 'neracadetail']);
Route::get('neraca-saldo/cetak/{waktu}', [NeracaController::class, 'cetakneraca']);


Route::get('laporan-laba-rugi', [LaporanController::class, 'showLaporan']);
Route::get('laporan/laba-rugi/{waktu}', [LaporanController::class, 'detaillaporan']);
Route::get('laporan/laba-rugi/cetak/{waktu}', [LaporanController::class, 'cetaklabarugi']);
Route::get('laporan/cetak/{waktu}', [LaporanController::class, 'cetakLaporan']);

Route::get('/halaman-utama', 'App\HTTP\Controllers\utamacontroller@halutama');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
