<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/login',[LoginController::class, 'login']);
Auth::routes();
Route::get('/','App\HTTP\Controllers\HomeController@home');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//halaman admin
Route::get('/halaman-admin','App\HTTP\Controllers\AdminController@haladmin');
//pelanggan
Route::get('/data-pelanggan','App\HTTP\Controllers\AdminController@datapelanggan');
Route::post('/data-pelanggan/tambah','App\HTTP\Controllers\AdminController@tambahpelanggan');
Route::get('/data-pelanggan/hapus/{id}','App\HTTP\Controllers\AdminController@hapuspel');
Route::get('/data-pelanggan/edit/{id}','App\HTTP\Controllers\AdminController@editpel');
Route::post('/data-pelanggan/update','App\HTTP\Controllers\AdminController@updatepel');
//jenis
Route::get('/data-jenis','App\HTTP\Controllers\AdminController@datajenis');
Route::post('/data-jenis/tambah','App\HTTP\Controllers\AdminController@tambahjenis');
Route::get('/data-jenis/hapus/{id}','App\HTTP\Controllers\AdminController@hapusjenis');
Route::get('/data-jenis/edit/{id}','App\HTTP\Controllers\AdminController@editjenis');
Route::post('/data-jenis/update','App\HTTP\Controllers\AdminController@updatejenis');
//beban
Route::get('/data-beban','App\HTTP\Controllers\AdminController@databeban');
Route::post('/data-beban/tambah','App\HTTP\Controllers\AdminController@tambahbeban');
Route::get('/data-beban/hapus/{id}','App\HTTP\Controllers\AdminController@hapusbeban');
Route::get('/data-beban/edit/{id}','App\HTTP\Controllers\AdminController@editbeban');
Route::post('/data-beban/update','App\HTTP\Controllers\AdminController@updatebeban');
//metode
Route::get('/data-metode','App\HTTP\Controllers\AdminController@datametode');
Route::post('/data-metode/tambah','App\HTTP\Controllers\AdminController@tambahmetode');
Route::get('/data-metode/hapus/{id}','App\HTTP\Controllers\AdminController@hapusmetode');
Route::get('/data-metode/edit/{id}','App\HTTP\Controllers\AdminController@editmetode');
Route::post('/data-metode/update','App\HTTP\Controllers\AdminController@dmetode');
//pesanan
Route::get('/pesanan','App\HTTP\Controllers\PesananController@halpesanan');



Route::get('/halaman-utama','App\HTTP\Controllers\utamacontroller@halutama');
// Halaman Data
// Data Pelanggan


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
