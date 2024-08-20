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

class PesananController extends Controller
{
    public function halpesanan(Request $request)
    {
        $pesanan = DB::table('pesanan')
        ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
        ->join('jenis', 'jenis.id', '=', 'pesanan.id_jenis')
        ->join('metodepembayaran', 'metodepembayaran.id', '=', 'pesanan.id_metode')
        ->orderBy('kode_pesanan', 'asc')
        ->get(['pelanggan.*', 'pesanan.*', 'metodepembayaran.*', 'jenis.*']);

        $pelanggan = DB::table('pelanggan')->get();

        $user = DB::table('users')->get();
        
        $jenis = DB::table('jenis')->get();
        
        return view('Admin/halpesanan',['pesanan'=>$pesanan,'pelanggan'=>$pelanggan,'jenis'=>$jenis,'users'=>$user,]);
        
    }

    
    public function getharga(Request $request){
        $data = Jenis::select('harga')->where('id', $request->id)->first();
       
        return response()->json($data);
    }

    public function getmetode(Request $request){
        $data1= DB::table('metodepembayaran')
        ->where('pembayaran', $request->jenis)->get();
        $data = Metode::select('namabank')->where('pembayaran', $request->jenis)->first();
       
        return response()->json($data1);
    }
    public function getkodebank(Request $request){
        $data= DB::table('metodepembayaran')->where('id', $request->id)->first();
        return response()->json($data);
    }

    public function tambahpesanan(Request $request)
    {

        $pesan = DB::table('pesanan')->latest()->first();
        $kodepesan = "MAS";
        $kodetahun = date('y');
        $kodemonth = date('m');
        $kodeday = date('d');

        if ($pesan == null) {
            // kode awal
            $kodeurut = "0001";
        } else {
            $kodeurut = substr($pesan->kode_pesanan, 12, 4);

            $kodeurut = str_pad((int) $kodeurut + 1, 4, "0", STR_PAD_LEFT);
        }

        $kode = $kodepesan . $kodetahun . $kodemonth . $kodeday . $kodeurut;

        $tgl= DB::table('jenis')->where('id', $request->id_jenis)->first();
        $tglhari = $tgl->hari;
        $tglselesai = $kodetahun . "-" . $kodemonth . "-" . $kodeday + $tglhari;
        $tgltransaksi = date("Y-m-d");

        $jumlah=$request->jumlah;
        $harga= $request->harga;
        $total=$jumlah*$harga;

        $pesanan = new Pesanan;
        $pesanan->kode_pesanan = $kode;
        $pesanan->id_pelanggan = $request->id_pelanggan;
        $pesanan->id_jenis = $request->id_jenis;
        $pesanan->id_metode = $request->id_metode;
        $pesanan->harga = $request->harga;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->total = $total;
        $pesanan->tgltransaksi = $tgltransaksi;
        $pesanan->tglselesai = $tglselesai;
        $pesanan->status = $request->jenisbayar;
        $pesanan->statuspembayaran = $request->statuspembayaran;
        $pesanan->statuspesanan = $request->statuspesanan;
        $pesanan->save();

        $jurnal = new Jurnal;
        $jurnal->id_akun = 3;
        $jurnal->nominal = $total;
        $jurnal->waktu_transaksi = $tgltransaksi;
        $jurnal->tipe = 'k';
        $jurnal->save();

        $jurnal = new Jurnal;
        $jurnal->id_akun = 1;
        $jurnal->nominal = $total;
        $jurnal->waktu_transaksi = $tgltransaksi;
        $jurnal->tipe = 'd';
        $jurnal->save();


        return redirect('pesanan');
    }

    public function hapuspesanan($kode_pesanan)
    {
        
        DB::table('pesanan')->where('kode_pesanan', $kode_pesanan)->delete();
        return redirect()->back()->with('pesan', 'Pesanan Berhasil Dihapus');

    }

    public function updatestatus($kode_pesanan, Request $request){

        $status = "Sudah Bayar";
        DB::table('pesanan')->where('kode_pesanan', $kode_pesanan)->update(['statuspembayaran'=> $status]);
        return redirect('pesanan');

    }
    function pilih_jenis(){
        $id_jenis=$_POST['id_jenis'];
        $h= "SELECT harga as harga_a FROM jenis WHERE id='$id_jenis'";
        $harga = $this->db->query($h)->row_array();
        echo json_encode($harga);
    }


}
