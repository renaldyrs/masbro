<?php

namespace App\Http\Controllers;

use DateTimeZone;
use Illuminate\Database\DBAL\TimestampType;
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
use Carbon\Carbon;

class KirimController extends Controller
{
    //
    public function halkirim(){
        $pengiriman = DB::table('pengiriman')
        ->join('pesanan', 'pesanan.id', '=', 'pengiriman.id_pesanan')
        ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
        ->orderBy('pesanan.kode_pesanan')
        ->select(['pelanggan.*', 'pesanan.*', 'pengiriman.*'])
        ->paginate(10);
        
        return view('Admin.halkirim',['pengiriman'=>$pengiriman,]);
    }

    public function kirim(Request $request){
    
        $tglpengiriman = date("Y-m-d");
        $statuspengiriman = "Proses Kirim";

        $pengiriman = DB::table('pengiriman');
        $pengiriman->insert([
            'id_pelanggan' => $request->idpelanggan,
            'id_pesanan' => $request->idpesanan,
            'statuspengiriman' =>$statuspengiriman,
            'tglpengiriman' => $tglpengiriman,
            
        ]);
        return redirect('halaman-kirim');
    }

    public function selesaikirim($kode_pesanan, Request $request){

        DB::table('pesanan')->where('kode_pesanan', $kode_pesanan)
        ->update(['statuslaundry'=> 'Sudah Dikirim']);

        $tglpengiriman = date("Y-m-d");
        $jampengiriman = Carbon::now();
        $status = "Selesai Kirim";
        DB::table('pengiriman')
        ->join('pesanan', 'pesanan.id', '=', 'pengiriman.id_pesanan')
        ->where('kode_pesanan', $kode_pesanan)
        ->update(['statuspengiriman'=> $status, 
        'tglpengiriman' => $tglpengiriman,
        'jampengiriman' => $jampengiriman]);
        return redirect('halaman-kirim');
    }

    public function sudahdiambil($kode_pesanan, Request $request){

        DB::table('pesanan')->where('kode_pesanan', $kode_pesanan)
        ->update(['statuslaundry'=> 'Sudah Diambil']);

        $tglpengiriman = date("Y-m-d");
        $jampengiriman = Carbon::now();
        $status = "Sudah Diambil";
        DB::table('pengiriman')
        ->join('pesanan', 'pesanan.id', '=', 'pengiriman.id_pesanan')
        ->where('kode_pesanan', $kode_pesanan)
        ->update(['statuspengiriman'=> $status,
        'tglpengiriman' => $tglpengiriman, 
        'jampengiriman' => $jampengiriman]);
        return redirect('halaman-kirim');
    }

}
