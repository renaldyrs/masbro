<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurnal;
use App\Models\Akun;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\JurnalRequest;

class JurnalController extends Controller
{
    public function haljurnal()
    {
        $daftar_jurnal = Jurnal::selectRaw("CONCAT(MONTH(waktu_transaksi), '-', YEAR(waktu_transaksi)) as waktu")->distinct()->get();

        $total_jurnal = $daftar_jurnal->count();

        return view('Pemilik\jurnal',  compact('daftar_jurnal', 'total_jurnal'));
    }

    public function tambahjurnal()
    {
        $daftar_akun = Akun::pluck('nama_akun', 'id');
        return view('Pemilik\jurnaltambah', compact('daftar_akun'));
    }

    public function simpanjurnal(Request $request)
    {
        Jurnal::create($request->all());
        Session::flash('pesan', 'Transaksi Berhasil Disimpan');
        return redirect('jurnal-umum');
    }

    public function detailjurnal(Request $request, $waktu)
    {
        if(empty($waktu)) return redirect('jurnal-umum');

        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));

        $daftar_jurnal = Jurnal::whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->get();

        $total_debet = Jurnal::where('tipe', 'd')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->sum('nominal');

        $total_kredit = Jurnal::where('tipe', 'k')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->sum('nominal');

        $total_jurnal = $daftar_jurnal->count();

        return view('Pemilik\jurnaldetail',  compact('daftar_jurnal', 'total_jurnal', 'periode', 'total_debet', 'total_kredit'));
    }

    public function cariJurnalUmum(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $waktu = $tahun.'-'.$bulan.'-01';
        $periode = date('F Y', strtotime($waktu));

        if(empty($bulan) || empty($tahun)) return redirect('jurnal-umum');

        $daftar_jurnal = Jurnal::whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->get();

        $total_debet = Jurnal::where('tipe', 'd')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->sum('nominal');

        $total_kredit = Jurnal::where('tipe', 'k')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->sum('nominal');

        $total_jurnal = $daftar_jurnal->count();

        if(!($total_jurnal)) return redirect('jurnal-umum')->with('pesan', "Jurnal Umum dengan Periode $bulan-$tahun tidak ditemukan");

        return view('jurnal-umum-detail',  compact('daftar_jurnal', 'total_jurnal', 'periode', 'total_debet', 'total_kredit'));
    }

    

    

    public function editJurnalUmum($id)
    {
        $daftar_akun = Akun::pluck('nama_akun', 'id');
        $jurnal = Jurnal::findOrFail($id);
        return view('edit-jurnal-umum', compact('jurnal', 'daftar_akun'));
    }

    public function updateJurnalUmum( $request, $id)
    {
        $jurnal = Jurnal::findOrFail($id);
        $jurnal->update($request->all());
        Session::flash('pesan', 'Transaksi Berhasil Diupdate');
        return redirect('jurnal-umum');
    }

    public function destroyJurnalUmum($id)
    {
        Jurnal::destroy($id);
        Session::flash('pesan', 'Transaksi Berhasil Dihapus');
        return redirect('jurnal-umum');
    }
}
