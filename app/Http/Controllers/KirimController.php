<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use Redirect;
use App\Models\User;
use App\Models\Pesanan;
use App\Models\pelanggan;
use App\Models\Jenis;
use App\Models\Metode;
use App\Models\Jurnal;

class KirimController extends Controller
{
    //
    public function halkirim(){
        $pesanan = DB::table('pesanan')
        ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
        ->join('jenis', 'jenis.id', '=', 'pesanan.id_jenis')
        ->join('metodepembayaran', 'metodepembayaran.id', '=', 'pesanan.id_metode')
        ->get(['pelanggan.*', 'pesanan.*', 'metodepembayaran.*', 'jenis.*']);

        $pelanggan = DB::table('pelanggan')->get();

        $user = DB::table('users')->get();
        
        $jenis = DB::table('jenis')->get();
        
        return view('Admin/halkirim',['pesanan'=>$pesanan,'pelanggan'=>$pelanggan,'jenis'=>$jenis,'users'=>$user,]);
    }

}
