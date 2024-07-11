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

class NeracaController extends Controller
{
    //
    public function halneracasaldo()
    {
        $daftar_neraca = Jurnal::selectRaw("CONCAT(MONTH(waktu_transaksi), '-', YEAR(waktu_transaksi)) as waktu")->distinct()->get();

        $total_neraca = $daftar_neraca->count();
        

        return view('Pemilik.neraca',  compact('daftar_neraca', 'total_neraca'));
    }
    public function neracadetail(Request $request, $waktu)
    {
        if(empty($waktu)) return redirect('neraca-saldo');

        $total_akun = Akun::all()->count();

        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));

        $total_saldo_debet = 0;
        $total_saldo_kredit = 0;

        for($i = 1; $i <= $total_akun; $i++){

            $daftar_buku[$i] = Jurnal::whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->where('id_akun', $i)->get();

            $total_debet[$i] = Jurnal::where('tipe', 'd')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->where('id_akun', $i)->sum('nominal');

            $total_kredit[$i] = Jurnal::where('tipe', 'k')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->where('id_akun', $i)->sum('nominal');

            $akun[$i] = Akun::findOrFail($i);

            if( substr($akun[$i]->kode_akun, 0, 1) === '1' ||  substr($akun[$i]->kode_akun, 0, 1) === '4'){
                $debet[$i] = $total_debet[$i] - $total_kredit[$i];
                $kredit[$i] = 0;
            }elseif( substr($akun[$i]->kode_akun, 0, 1) === '2' ||  substr($akun[$i]->kode_akun, 0, 1) === '3' || substr($akun[$i]->kode_akun, 0, 1) === '5'){
                $kredit[$i] = $total_kredit[$i] - $total_debet[$i];
                $debet[$i] = 0;
            }

            $data[$i] = [
                'nama_akun' => $akun[$i]->nama_akun,
                'debet' => $debet[$i],
                'kredit' => $kredit[$i],
            ];

            $total_saldo_debet += $data[$i]['debet'];
            $total_saldo_kredit += $data[$i]['kredit'];
        }

        return view('pemilik.neracadet', compact('data', 'total_saldo_debet', 'total_saldo_kredit', 'periode'));
    }

    public function cetakneraca(request $request, $waktu)
    {
        if(empty($waktu)) return redirect('neraca-saldo');

        $total_akun = Akun::all()->count();

        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));

        $total_saldo_debet = 0;
        $total_saldo_kredit = 0;

        for($i = 1; $i <= $total_akun; $i++){

            $daftar_buku[$i] = Jurnal::whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->where('id_akun', $i)->get();

            $total_debet[$i] = Jurnal::where('tipe', 'd')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->where('id_akun', $i)->sum('nominal');

            $total_kredit[$i] = Jurnal::where('tipe', 'k')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->where('id_akun', $i)->sum('nominal');

            $akun[$i] = Akun::findOrFail($i);

            if( substr($akun[$i]->kode_akun, 0, 1) === '1' ||  substr($akun[$i]->kode_akun, 0, 1) === '4'){
                $debet[$i] = $total_debet[$i] - $total_kredit[$i];
                $kredit[$i] = 0;
            }elseif( substr($akun[$i]->kode_akun, 0, 1) === '2' ||  substr($akun[$i]->kode_akun, 0, 1) === '3' || substr($akun[$i]->kode_akun, 0, 1) === '5'){
                $kredit[$i] = $total_kredit[$i] - $total_debet[$i];
                $debet[$i] = 0;
            }

            $data[$i] = [
                'nama_akun' => $akun[$i]->nama_akun,
                'debet' => $debet[$i],
                'kredit' => $kredit[$i],
            ];

            $total_saldo_debet += $data[$i]['debet'];
            $total_saldo_kredit += $data[$i]['kredit'];
        }

        $pdf= PDF::loadView('Pemilik.neracacetak', compact('data', 'total_saldo_debet', 'total_saldo_kredit', 'periode'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('Neraca Saldo'.$periode.'.pdf');

    }
}
