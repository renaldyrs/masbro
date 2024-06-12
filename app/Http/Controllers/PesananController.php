<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use Redirect;
use App\Models\Pesanan;
use App\Models\pelanggan;
use App\Models\Jenis;

class PesananController extends Controller
{
    public function halpesanan(Request $request)
    {
        $pesanan = DB::table('pesanan')->get();
        $pelanggan = DB::table('pelanggan')->get();
        $jenis = DB::table('jenis')->get();
        

        return view('Admin/halpesanan',['pesanan'=>$pesanan,'pelanggan'=>$pelanggan,'jenis'=>$jenis]);
        
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

        $tglselesai = $kodetahun . "-" . $kodemonth . "-" . $kodeday + 3;
        $tglmasuk = $kodetahun . "-" . $kodemonth . "-" . $kodeday;

        $pesanan = new Pesanan;
        $pesanan->kode_pesanan = $kode;
        $pesanan->nama_pelanggan = $request->nama_pelanggan;
        $pesanan->jenis = $request->jenis;
        $pesanan->kg = $request->kg;
        $pesanan->harga = $request->harga;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->total = $request->total;
        // $pesanan->tgltransaksi = $tgltransaksi;
        $pesanan->tglselesai = $tglselesai;
        $pesanan->status = $request->status;
        $pesanan->statuspembayaran = $request->statuspembayaran;
        $pesanan->save();

        return redirect('pesanan');
    }

    public function hapuspesanan($id_pesanan)
    {

        DB::table('pesanan')->where('id_pesanan', $id_pesanan)->delete();

        $pelanggan = DB::table('pesanan')->get();

        return redirect('pesanan');

    }

    function pilih_jenis(){
        $id_jenis=$_POST['id_jenis'];
        $h= "SELECT harga as harga_a FROM jenis WHERE id='$id_jenis'";
        $harga = $this->db->query($h)->row_array();
        echo json_encode($harga);
    }


}
