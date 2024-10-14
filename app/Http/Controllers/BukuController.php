<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurnal;
use App\Models\Akun;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\JurnalRequest;
use Barryvdh\DomPDF\ServiceProvider;
use Crabbly\Fpdf\Fpdf as FPDF;
use PDF;
use DB;
use Terbilang;

class BukuController extends Controller
{

    //------------------------------------------------------------Buku Besar---------------------------------------------
    public function halbukubesar()
    {
        $daftar_jurnal = Jurnal::selectRaw("CONCAT(MONTH(waktu_transaksi), '-', YEAR(waktu_transaksi)) as waktu")->distinct()->get();

        $daftar_akun = Akun::all();
        return view('Laporan.Bukubesar', compact('daftar_akun','daftar_jurnal'));
    }

    public function akunbukubesar($id)
    {
    
        $daftar_akun = Jurnal::selectRaw("CONCAT(MONTH(waktu_transaksi), '-', YEAR(waktu_transaksi)) as waktu")->where('id_akun', $id)->distinct()->get();

        $total_bukubesar = $daftar_akun->count();
        $akun = Akun::findOrFail($id);
        return view('Laporan.Bukubesar-akun', compact('daftar_akun', 'total_bukubesar', 'akun'));

    }

    public function periodebukubesar($waktu)
    {
    
        $daftar_akun = Jurnal::selectRaw("CONCAT(MONTH(waktu_transaksi), '-', YEAR(waktu_transaksi)) as waktu")->where('waktu_transaksi', $waktu)->distinct()->get();

        $total_bukubesar = $daftar_akun->count();
        $akun = Akun::findOrFail($waktu);
        return view('Laporan.Bukubesar-akun', compact('daftar_akun', 'total_bukubesar', 'akun'));

    }

    public function detailbukubesar($id, $waktu)
    {
        if(empty($waktu) || empty($id)) return redirect('buku-besar');

        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));

        $daftar_buku = Jurnal::whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->where('id_akun', $id)->get();

        $total_debet = Jurnal::where('tipe', 'd')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->where('id_akun', $id)->sum('nominal');

        $total_kredit = Jurnal::where('tipe', 'k')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->where('id_akun', $id)->sum('nominal');

        $total_buku = $daftar_buku->count();

        $akun = Akun::findOrFail($id);

        return view('Laporan.Bukubesar-detail', compact('daftar_buku', 'total_buku', 'periode', 'total_debet', 'total_kredit', 'akun'));
    }
}
