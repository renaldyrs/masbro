<?php

namespace App\Http\Controllers;

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

class KirimController extends Controller
{
    //
    public function halkirim(){
        $pengiriman = DB::table('pengiriman')
        ->join('pesanan', 'pesanan.id', '=', 'pengiriman.id_pesanan')
        ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
        
        ->get(['pelanggan.*', 'pesanan.*', 'pengiriman.*']);
        
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

        
        DB::table('pesanan')->where('kode_pesanan', $kode_pesanan)->update(['statuslaundry'=> 'Sudah Kirim']);

        $jampengiriman = date('H:i:s');
        $status = "Selesai Kirim";
        DB::table('pengiriman')
        ->join('pesanan', 'pesanan.id', '=', 'pengiriman.id_pesanan')
        ->where('kode_pesanan', $kode_pesanan)
        ->update(['statuspengiriman'=> $status, 'jampengiriman' => $request->$jampengiriman]);
        return redirect('halaman-kirim');
    }

}
