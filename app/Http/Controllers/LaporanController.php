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

class LaporanController extends Controller
{
    //
    public function showLaporan()
    {
        $daftar_jurnal = Jurnal::selectRaw("CONCAT(MONTH(waktu_transaksi), '-', YEAR(waktu_transaksi)) as waktu")->distinct()->get();

        $total_jurnal = $daftar_jurnal->count();

        return view('Laporan.laporan', compact('daftar_jurnal', 'total_jurnal'));
    }

    public function detaillaporan($waktu)
    {
        $waktu1 = $waktu;
        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));

        $daftar_jurnal = Jurnal::selectRaw("CONCAT(MONTH(waktu_transaksi), '-', YEAR(waktu_transaksi)) as waktu")->distinct()->get();


        $pendapatan = Jurnal::where('id_akun', 3)
        ->whereMonth('waktu_transaksi', $bulan)
        ->whereYear('waktu_transaksi', $tahun)
        ->orderBy('waktu_transaksi', 'asc')
        ->sum('nominal');
        $total_pendapatan = $pendapatan;

        $beban_gaji=Jurnal::where('id_akun', 4)
        ->whereMonth('waktu_transaksi', $bulan)
        ->whereYear('waktu_transaksi', $tahun)
        ->orderBy('waktu_transaksi', 'asc')
        ->sum('nominal');

        $beban_listrik=Jurnal::where('id_akun', 6)
        ->whereMonth('waktu_transaksi', $bulan)
        ->whereYear('waktu_transaksi', $tahun)
        ->orderBy('waktu_transaksi', 'asc')
        ->sum('nominal');

        $beban_air=Jurnal::where('id_akun', 7)
        ->whereMonth('waktu_transaksi', $bulan)
        ->whereYear('waktu_transaksi', $tahun)
        ->orderBy('waktu_transaksi', 'asc')
        ->sum('nominal');

        $total_beban = $beban_gaji+$beban_listrik+$beban_air;

        $laba_bersih = $total_pendapatan-$total_beban;

        return view('Laporan.laporan-detail', compact('periode', 'pendapatan', 'total_pendapatan','beban_gaji','beban_listrik','beban_air','total_beban','bulan','tahun','laba_bersih','daftar_jurnal','waktu1'));
    }

    public function cetaklabarugi($waktu)
    {
        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));

        $daftar_jurnal = Jurnal::selectRaw("CONCAT(MONTH(waktu_transaksi), '-', YEAR(waktu_transaksi)) as waktu")->distinct()->get();


        $pendapatan = Jurnal::where('id_akun', 3)
        ->whereMonth('waktu_transaksi', $bulan)
        ->whereYear('waktu_transaksi', $tahun)
        ->orderBy('waktu_transaksi', 'asc')
        ->sum('nominal');
        $total_pendapatan = $pendapatan;

        $beban_gaji=Jurnal::where('id_akun', 4)
        ->whereMonth('waktu_transaksi', $bulan)
        ->whereYear('waktu_transaksi', $tahun)
        ->orderBy('waktu_transaksi', 'asc')
        ->sum('nominal');

        $beban_listrik=Jurnal::where('id_akun', 6)
        ->whereMonth('waktu_transaksi', $bulan)
        ->whereYear('waktu_transaksi', $tahun)
        ->orderBy('waktu_transaksi', 'asc')
        ->sum('nominal');

        $beban_air=Jurnal::where('id_akun', 7)
        ->whereMonth('waktu_transaksi', $bulan)
        ->whereYear('waktu_transaksi', $tahun)
        ->orderBy('waktu_transaksi', 'asc')
        ->sum('nominal');

        $total_beban = $beban_gaji+$beban_listrik+$beban_air;

        $laba_bersih = $total_pendapatan-$total_beban;

        $pdf= \Barryvdh\DomPDF\Facade\Pdf::loadView('Laporan.laporan-cetak', compact('periode', 'pendapatan', 'total_pendapatan','beban_gaji','beban_listrik','beban_air','total_beban','bulan','tahun','laba_bersih','daftar_jurnal'));

        return $pdf->download('Laporan Laba Rugi '.$periode.'.pdf');
    }
    public function cetakjurnal($waktu)
    {
        if (empty($waktu))
            return redirect('jurnal');

        $pdf = new FPDF;

        $pdf->AddPage('L', 'A4');

        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));
        $periode = strtoupper($periode);

        // Header
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, "LAPORAN KEUANGAN $periode", 0, 2, 'C');

        // Jurnal Umum
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, "JURNAL UMUM $periode", 0, 2, 'C');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(25, 10, "NO", 1, 0, 'C');
        $pdf->Cell(63, 10, "WAKTU", 1, 0, 'C');
        $pdf->Cell(63, 10, "AKUN", 1, 0, 'C');
        $pdf->Cell(63, 10, "DEBET", 1, 0, 'C');
        $pdf->Cell(63, 10, "KREDIT", 1, 0, 'C');
        $pdf->Ln();

        $daftar_jurnal = Jurnal::whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->get();

        $total_debet = Jurnal::where('tipe', 'd')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->sum('nominal');

        $total_kredit = Jurnal::where('tipe', 'k')->whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->sum('nominal');

        $pdf->SetFont('Arial', '', 12);

        $i = 1;
        foreach ($daftar_jurnal as $data) {
            $pdf->Cell(25, 10, $i++, 1, 0, 'C');
            $pdf->Cell(63, 10, $data->waktu_transaksi, 1, 0, 'C');
            $pdf->Cell(63, 10, $data->akun->nama_akun, 1, 0, 'C');
            if ($data->tipe === 'd')
                $pdf->Cell(63, 10, 'Rp. ' . number_format($data->nominal, 0, ',', '.') . ',-', 1, 0, 'C');
            else
                $pdf->Cell(63, 10, '-', 1, 0, 'C');
            if ($data->tipe === 'k')
                $pdf->Cell(63, 10, 'Rp. ' . number_format($data->nominal, 0, ',', '.') . ',-', 1, 0, 'C');
            else
                $pdf->Cell(63, 10, '-', 1, 0, 'C');
            $pdf->Ln();
        }
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(151, 10, 'TOTAL', 1, 0, 'C');

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(63, 10, 'Rp. ' . number_format($total_debet, 0, ',', '.') . ',-', 1, 0, 'C');
        $pdf->Cell(63, 10, 'Rp. ' . number_format($total_kredit, 0, ',', '.') . ',-', 1, 0, 'C');
        $pdf->Ln();

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(35, 10, 'TERBILANG', 1, 0, 'C');

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(121, 10, strtoupper(Terbilang::make($total_debet)) . ' RUPIAH', 1, 0, 'C');
        $pdf->Cell(121, 10, strtoupper(Terbilang::make($total_kredit)) . ' RUPIAH', 1, 0, 'C');
        $pdf->Ln();


        // Save
        Session::flash('pesan', 'Laporan Berhasil Diunduh');
        return $pdf->Output('D', "LAPORAN JURNAL UMUM $periode.pdf");
    }

    public function cetakbukubesar($waktu)
    {
        if (empty($waktu))
            return redirect('laporan');

        $pdf = new FPDF;

        $pdf->AddPage('L', 'A4');

        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));
        $periode = strtoupper($periode);

        // Buku Besar
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, "DAFTAR BUKU BESAR $periode", 0, 2, 'C');

        $id = Akun::pluck('id');

        foreach ($id as $i) {
            $daftar_buku[$i] = Jurnal::whereMonth('waktu_transaksi', $bulan)->whereYear('waktu_transaksi', $tahun)->orderBy('waktu_transaksi', 'asc')->where('id_akun', $i)->get();

            $data[$i] =
                [
                    'akun' => Akun::findOrFail($i),
                    'daftar_buku' => $daftar_buku[$i],
                    'jumlah_debet' => $daftar_buku[$i]->where('tipe', 'd')->sum('nominal'),
                    'jumlah_kredit' => $daftar_buku[$i]->where('tipe', 'k')->sum('nominal'),
                ];

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(92, 10, "AKUN : " . $data[$i]['akun']->nama_akun, 0, 0, 'L');
            $pdf->Cell(92, 10, "PERIODE : $periode", 0, 0, 'C');
            $pdf->Cell(92, 10, "KODE : " . $data[$i]['akun']->kode_akun, 0, 0, 'R');
            $pdf->Ln();

            $pdf->Cell(138, 10, "TRANSAKSI", 1, 0, 'C');
            $pdf->Cell(138, 10, "SALDO", 1, 0, 'C');
            $pdf->Ln();

            $pdf->Cell(10, 10, "NO", 1, 0, 'C');
            $pdf->Cell(30, 10, "WAKTU", 1, 0, 'C');
            $pdf->Cell(125, 10, "KETERANGAN", 1, 0, 'C');
            $pdf->Cell(56, 10, "DEBET", 1, 0, 'C');
            $pdf->Cell(55, 10, "KREDIT", 1, 0, 'C');
            $pdf->Ln();

            $j = 1;
            foreach ($data[$i]['daftar_buku'] as $item) {
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(10, 10, $j, 1, 0, 'C');
                $pdf->Cell(30, 10, $item['waktu_transaksi'], 1, 0, 'C');
                $pdf->Cell(125, 10, $item['keterangan'], 1, 0, 'C');
                $pdf->Cell(56, 10, "Rp. " . number_format(($item['tipe'] === 'd') ? $item['nominal'] : "0", 0, ',', '.') . ",-", 1, 0, 'C');
                $pdf->Cell(55, 10, "Rp. " . number_format(($item['tipe'] === 'k') ? $item['nominal'] : "0", 0, ',', '.') . ",-", 1, 0, 'C');
                $pdf->Ln();
                $j++;
            }
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(140, 10, "JUMLAH", 1, 0, 'C');
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(68, 10, "Rp. " . number_format($data[$i]['jumlah_debet'], 0, ',', '.') . ",-", 1, 0, 'C');
            $pdf->Cell(68, 10, "Rp. " . number_format($data[$i]['jumlah_kredit'], 0, ',', '.') . ",-", 1, 0, 'C');
            $pdf->Ln();

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(140, 10, "SALDO", 1, 0, 'C');
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(136, 10, "Rp. " . number_format(
                (substr($data[$i]['akun']->kode_akun, 0, 1) === '1' || substr($data[$i]['akun']->kode_akun, 0, 1) === '4') ? $data[$i]['jumlah_debet'] - $data[$i]['jumlah_kredit'] : (((substr($data[$i]['akun']->kode_akun, 0, 1) === '2' || substr($data[$i]['akun']->kode_akun, 0, 1) === '3') || substr($data[$i]['akun']->kode_akun, 0, 1) === '5') ? $data[$i]['jumlah_kredit'] - $data[$i]['jumlah_debet'] : "0")
                ,
                0,
                ',',
                '.'
            ) . ",-", 1, 0, 'C');
            $pdf->Ln();

            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(50, 10, "TERBILANG", 1, 0, 'C');
            $pdf->SetFont('Arial', '', 12);
            $pdf->Cell(226, 10, strtoupper(Terbilang::make((substr($data[$i]['akun']->kode_akun, 0, 1) === '1' || substr($data[$i]['akun']->kode_akun, 0, 1) === '4') ? $data[$i]['jumlah_debet'] - $data[$i]['jumlah_kredit'] : (((substr($data[$i]['akun']->kode_akun, 0, 1) === '2' || substr($data[$i]['akun']->kode_akun, 0, 1) === '3') || substr($data[$i]['akun']->kode_akun, 0, 1) === '5') ? $data[$i]['jumlah_kredit'] - $data[$i]['jumlah_debet'] : "0"))) . "RUPIAH", 1, 0, 'C');
            $pdf->Ln();

            
        }

        // Save
        Session::flash('pesan', 'Laporan Berhasil Diunduh');
        return $pdf->Output('D', "LAPORAN $periode.pdf");
    }
}
