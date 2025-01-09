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
use Crabbly\Fpdf\Fpdf as FPDF;
use Carbon\Carbon;
class PesananController extends Controller
{
    public function dashboardpesanan()
    {
        
        $pesanan = DB::table('pesanan')
            ->select([
                'pelanggan.*',
                'pesanan.*',
                'metodepembayaran.*',
                'jenis.*',
                'pesanan.id as idpesanan',
                'pesanan.kode_pesanan as kodepesanan',
                'users.name as namauser',
            ])
            ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
            ->join('jenis', 'jenis.id', '=', 'pesanan.id_jenis')
            ->join('metodepembayaran', 'metodepembayaran.id', '=', 'pesanan.id_metode')
            ->join('pengiriman', 'pengiriman.id_pesanan', '=', 'pesanan.id')
            ->join('users', 'users.id', '=', 'pesanan.id_users')
            ->groupBy('tgltransaksi')
            ->orderBy('kode_pesanan', 'asc')
            ->get();

        return view('Transaksi.pesanan-dashboard', ['pesanan' => $pesanan]);
    }
    public function halpesanan(Request $request)
    {

        $pelanggan = DB::table('pelanggan')->get();
        $user = DB::table('users')->get();
        $jenis = DB::table('jenis')->get();


        $pesanan = DB::table('pesanan')
            ->select([
                'pelanggan.*',
                'pesanan.*',
                'metodepembayaran.*',
                'jenis.*',
                'pesanan.id as idpesanan',
                'pesanan.kode_pesanan as kodepesanan',
                'users.name as namauser',
                
            ])
            
            ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
            ->join('jenis', 'jenis.id', '=', 'pesanan.id_jenis')
            ->join('metodepembayaran', 'metodepembayaran.id', '=', 'pesanan.id_metode')
            ->join('pengiriman', 'pengiriman.id_pesanan', '=', 'pesanan.id')
            ->join('users', 'users.id', '=', 'pesanan.id_users')

            ->where([

                ['statuspembayaran', 'like', '%' . $request->statusbayar . '%'],
                ['jenisbayar', 'like', '%' . $request->pembayaran . '%'],
                ['statuslaundry', 'like', '%' . $request->laundry . '%'],
                ['pengiriman', 'like', '%' . $request->pengiriman . '%'],
                ['tgltransaksi', 'like', '%' . $request->tgl . '%'],
                ['statuslaundry', '!=', 'Sudah Diambil'],
                ['statuslaundry', '!=', 'Sudah Dikirim'],
                ['statuslaundry', '!=', 'Selesai Laundry']
            ])
            ->orderBy('kode_pesanan', 'asc')
            ->paginate(10);

        return view('Transaksi.Pesanan', ['pesanan' => $pesanan, 'pelanggan' => $pelanggan, 'jenis' => $jenis, 'users' => $user,]);

    }

    public function halpesananselesai(Request $request)
    {
        $pelanggan = DB::table('pelanggan')->get();
        $user = DB::table('users')->get();
        $jenis = DB::table('jenis')->get();

        $pesanan = DB::table('pesanan')
            ->select(['pelanggan.*', 'pesanan.*', 'metodepembayaran.*', 'jenis.*', 'pesanan.id as idpesanan', 'pesanan.kode_pesanan as kodepesanan'])
            ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
            ->join('jenis', 'jenis.id', '=', 'pesanan.id_jenis')
            ->join('metodepembayaran', 'metodepembayaran.id', '=', 'pesanan.id_metode')
            ->join('pengiriman', 'pengiriman.id_pesanan', '=', 'pesanan.id')

            ->where([
                ['statuspembayaran', 'like', '%' . $request->statusbayar . '%'],
                ['jenisbayar', 'like', '%' . $request->pembayaran . '%'],
                ['statuslaundry', 'like', '%' . $request->laundry . '%'],
                ['pengiriman', 'like', '%' . $request->pengiriman . '%'],
                ['tgltransaksi', 'like', '%' . $request->tgl . '%'],



            ])
            ->whereIn('statuslaundry', ['Sudah Diambil', 'Sudah Dikirim'])


            ->orderBy('kode_pesanan', 'asc')
            ->paginate(10);

        return view('Transaksi.Pesanan-selesai', ['pesanan' => $pesanan, 'pelanggan' => $pelanggan, 'jenis' => $jenis, 'users' => $user,]);

    }


    public function getharga(Request $request)
    {
        $data = Jenis::select('harga')->where('id', $request->id)->first();

        return response()->json($data);
    }

    public function getmetode(Request $request)
    {
        $data1 = DB::table('metodepembayaran')
            ->where('pembayaran', $request->jenis)->get();
        $data = Metode::select('namabank')->where('pembayaran', $request->jenis)->first();

        return response()->json($data1);
    }
    public function getkodebank(Request $request)
    {
        $data = DB::table('metodepembayaran')->where('id', $request->id)->first();
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
            $kodeurut = substr($pesan->kode_pesanan, 10, 4);

            $kodeurut = str_pad((int) $kodeurut + 1, 4, "0", STR_PAD_LEFT);
        }

        if ($pesan == null) {
            $id = 1;
        } else {
            $id = $pesan->id + 1;
        }


        $kode = $kodepesan . $kodetahun . $kodemonth . $kodeday . $kodeurut;

        $tgl = DB::table('jenis')->where('id', $request->id_jenis)->first();
        $tglhari = $tgl->hari;
        $tglselesai = $kodetahun . "-" . $kodemonth . "-" . ($kodeday + $tglhari);
        $tgltransaksi = date("Y-m-d");

        $jumlah = $request->jumlah;
        $harga = $request->harga;
        $total = $jumlah * $harga;
        $statuslaundry = "Proses Laundry";

        $pesanan = new Pesanan;
        $pesanan->id = $id;
        $pesanan->kode_pesanan = $kode;
        $pesanan->id_pelanggan = $request->id_pelanggan;
        $pesanan->id_jenis = $request->id_jenis;
        $pesanan->id_metode = $request->id_metode;
        $pesanan->id_users = $request->iduser;
        $pesanan->harga = $request->harga;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->total = $total;
        $pesanan->tgltransaksi = $tgltransaksi;
        $pesanan->tglselesai = $tglselesai;
        $pesanan->jenisbayar = $request->jenisbayar;
        $pesanan->statuspembayaran = $request->statuspembayaran;
        $pesanan->statuslaundry = $statuslaundry;
        $pesanan->pengiriman = $request->pengiriman;
        $pesanan->save();

        if ($request->statuspembayaran == "Sudah Bayar") {
            $idpesanan = $pesanan->id++;

            $jurnal = new Jurnal;
            $jurnal->id_akun = 3;
            $jurnal->id_pesanan = $idpesanan;
            $jurnal->nominal = $total;
            $jurnal->waktu_transaksi = $tgltransaksi;
            $jurnal->tipe = 'k';
            $jurnal->save();

            $jurnal = new Jurnal;
            $jurnal->id_akun = 1;
            $jurnal->id_pesanan = $idpesanan;
            $jurnal->nominal = $total;
            $jurnal->waktu_transaksi = $tgltransaksi;
            $jurnal->tipe = 'd';
            $jurnal->save();

        } elseif ($request->statuspembayaran == "Belum Bayar") {
            $idpesanan = $pesanan->id++;

            $jurnal = new Jurnal;
            $jurnal->id_akun = 3;
            $jurnal->id_pesanan = $idpesanan;
            $jurnal->nominal = 0;
            $jurnal->waktu_transaksi = $tgltransaksi;
            $jurnal->tipe = 'k';
            $jurnal->save();

            $jurnal = new Jurnal;
            $jurnal->id_akun = 1;
            $jurnal->id_pesanan = $idpesanan;
            $jurnal->nominal = 0;
            $jurnal->waktu_transaksi = $tgltransaksi;
            $jurnal->tipe = 'd';
            $jurnal->save();
        }

        if ($request->pengiriman == "Kirim") {
            if ($pesan == null) {
                $id = 1;
            } else {
                $id = $pesan->id + 1;
            }
            $pesanan = DB::table('pesanan')->latest()->first();
            $idpesanan = $pesanan->id++;

            $tglpengiriman = null;
            $statuspengiriman = "-";

            $pengiriman = DB::table('pengiriman');
            $pengiriman->insert([
                'id' => $id,
                'id_pelanggan' => $request->id_pelanggan,
                'id_pesanan' => $idpesanan,
                'statuspengiriman' => $statuspengiriman,
                'tglpengiriman' => $tglpengiriman,
            ]);
        } elseif ($request->pengiriman == "Ambil") {
            if ($pesan == null) {
                $id = 1;
            } else {
                $id = $pesan->id + 1;
            }
            $pesanan = DB::table('pesanan')->latest()->first();
            $idpesanan = $pesanan->id++;

            $tglpengiriman = null;
            $statuspengiriman = "-";

            $pengiriman = DB::table('pengiriman');
            $pengiriman->insert([
                'id' => $id,
                'id_pelanggan' => $request->id_pelanggan,
                'id_pesanan' => $idpesanan,
                'statuspengiriman' => $statuspengiriman,
                'tglpengiriman' => $tglpengiriman,
            ]);
        }

        return redirect('pesanan');
    }

    public function hapuspesanan($kode_pesanan)
    {

        DB::table('pesanan')->where('kode_pesanan', $kode_pesanan)->delete();
        return redirect()->back()->with('pesan', 'Pesanan Berhasil Dihapus');

    }

    public function updatestatus($kode_pesanan, Request $request)
    {
        $tgltransaksi = date("Y-m-d");
        $pesanan = DB::table('pesanan')->where('kode_pesanan', $kode_pesanan)->first();
        $nominal = $pesanan->total;

        DB::table('jurnal')
            ->join('pesanan', 'jurnal.id_pesanan', '=', 'pesanan.id')
            ->where('pesanan.kode_pesanan', $kode_pesanan)
            ->update([
                'nominal' => $nominal,
            ]);

        $status = "Sudah Bayar";
        DB::table('pesanan')
            ->where('kode_pesanan', $kode_pesanan)
            ->update(['statuspembayaran' => $status]);
        return redirect('pesanan');

    }
    public function updatekirim($id, Request $request)
    {


        $status = "Proses Kirim";
        DB::table('pengiriman')->where('id_pesanan', $id)
            ->update([
                'statuspengiriman' => $status
            ]);

        DB::table('pesanan')
            ->where('id', $id)
            ->update(['statuslaundry' => 'Proses Kirim']);
        return redirect('pesanan');
    }

    public function ambillaundry($kode_pesanan, Request $request)
    {
        $tglambil = date("Y-m-d");
        $status = "Siap Diambil";
        DB::table('pengiriman')
            ->join('pesanan', 'pengiriman.id_pesanan', '=', 'pesanan.id')
            ->where('pesanan.kode_pesanan', $kode_pesanan)
            ->update([
                'statuspengiriman' => $status,
                'tglpengiriman' => $tglambil,
            ]);

        DB::table('pesanan')
            ->where('kode_pesanan', $kode_pesanan)
            ->update(['statuslaundry' => $status]);
        return redirect('pesanan');
    }

    public function selesailaundry($kode_pesanan, Request $request)
    {
        $selesai = DB::table('pesanan')
            ->where([['kode_pesanan', $kode_pesanan]])
            ->first();

        if ($selesai->pengiriman == "Kirim") {
            $status = "Selesai Laundry";
            DB::table('pesanan')
                ->where([['kode_pesanan', $kode_pesanan], ['pengiriman', 'Kirim']])
                ->update(['statuslaundry' => $status]);

            $statuskirim = "Siap Dikirim";
            DB::table('pengiriman')
                ->where('id', $selesai->id)
                ->update(['statuspengiriman' => $statuskirim]);

        } elseif ($selesai->pengiriman == "Ambil") {
            $status = "Selesai Laundry";
            DB::table('pesanan')
                ->where([['kode_pesanan', $kode_pesanan], ['pengiriman', 'Ambil']])
                ->update(['statuslaundry' => $status]);

            $statuskirim = "Siap Diambil";
            DB::table('pengiriman')
                ->where('id', $selesai->id)
                ->update(['statuspengiriman' => $statuskirim]);
        }

        return redirect('pesanan');
    }


    function pilih_jenis()
    {
        $id_jenis = $_POST['id_jenis'];

        $harga = DB::table("jenis")
            ->select("harga")
            ->where("id", $id_jenis);
        echo json_encode($harga);
    }


    function laporanpesanan(Request $request)
    {
        $daftar_pesanan = DB::table('pesanan')
            ->selectRaw("CONCAT(MONTH(tgltransaksi), '-', YEAR(tgltransaksi)) as waktu")
            ->distinct()
            ->get();

        $total_pesanan = $daftar_pesanan->count();

        return view('Transaksi.Pesanan-laporan', compact('daftar_pesanan', 'total_pesanan'));

    }
    function periodepesanan($waktu)
    {

        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));

        $daftar_pesanan = DB::table('pesanan')
            ->selectRaw("CONCAT(MONTH(tgltransaksi), '-', YEAR(tgltransaksi)) as waktu")
            ->distinct()
            ->get();

        $kirim = DB::table('pesanan')
            ->where('pengiriman', '=', 'Kirim')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun);
        $countkirim = $kirim->count();

        $ambil = DB::table('pesanan')
            ->where('pengiriman', '=', 'ambil')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun);
        $countambil = $ambil->count();

        $pendapatan = DB::table('pesanan')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');
        $total_pesanan = $daftar_pesanan->count();

        $cucibasah = DB::table('pesanan')
            ->where('id_jenis', '1')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');
        $cucikering = DB::table('pesanan')
            ->where('id_jenis', '2')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');
        $cucisetrika = DB::table('pesanan')
            ->where('id_jenis', '3')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');
        $setrika = DB::table('pesanan')
            ->where('id_jenis', '4')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');
        $karpet = DB::table('pesanan')
            ->where('id_jenis', '5')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');

        $countcucibasah = DB::table('pesanan')
            ->where('id_jenis', '1')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->count();
        $countcucikering = DB::table('pesanan')
            ->where('id_jenis', '2')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->count();
        $countcucisetrika = DB::table('pesanan')
            ->where('id_jenis', '3')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->count();
        $countsetrika = DB::table('pesanan')
            ->where('id_jenis', '4')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->count();
        $countkarpet = DB::table('pesanan')
            ->where('id_jenis', '5')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->count();
        $countpesanan = $countcucibasah + $countcucisetrika + $countcucikering + $countsetrika + $countkarpet;

        return view(
            'Transaksi.Pesanan-cetak',
            compact(
                'daftar_pesanan',
                'total_pesanan',
                'periode',
                'countkirim',
                'countambil',
                'pendapatan',
                'cucikering',
                'cucibasah',
                'cucisetrika',
                'setrika',
                'karpet',
                'countcucikering',
                'countcucibasah',
                'countcucisetrika',
                'countsetrika',
                'countkarpet',
                'countpesanan'
            )
        );

    }

    function laporancetak($waktu)
    {
        $bulan = date('m', strtotime($waktu));
        $tahun = date('Y', strtotime($waktu));
        $periode = date('F Y', strtotime($waktu));

        $daftar_pesanan = DB::table('pesanan')
            ->selectRaw("CONCAT(MONTH(tgltransaksi), '-', YEAR(tgltransaksi)) as waktu")
            ->distinct()
            ->get();


        $kirim = DB::table('pesanan')
            ->where('pengiriman', '=', 'Kirim')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun);
        $countkirim = $kirim->count();

        $ambil = DB::table('pesanan')
            ->where('pengiriman', '=', 'ambil')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun);
        $countambil = $ambil->count();

        $pendapatan = DB::table('pesanan')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');
        $total_pesanan = $daftar_pesanan->count();

        $cucibasah = DB::table('pesanan')
            ->where('id_jenis', '1')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');
        $cucikering = DB::table('pesanan')
            ->where('id_jenis', '2')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');
        $cucisetrika = DB::table('pesanan')
            ->where('id_jenis', '3')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');
        $setrika = DB::table('pesanan')
            ->where('id_jenis', '4')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');
        $karpet = DB::table('pesanan')
            ->where('id_jenis', '5')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->sum('total');

        $countcucibasah = DB::table('pesanan')
            ->where('id_jenis', '1')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->count();
        $countcucikering = DB::table('pesanan')
            ->where('id_jenis', '2')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->count();
        $countcucisetrika = DB::table('pesanan')
            ->where('id_jenis', '3')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->count();
        $countsetrika = DB::table('pesanan')
            ->where('id_jenis', '4')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->count();
        $countkarpet = DB::table('pesanan')
            ->where('id_jenis', '5')
            ->whereMonth('tgltransaksi', $bulan)
            ->whereYear('tgltransaksi', $tahun)
            ->count();
        $countpesanan = $countcucibasah + $countcucisetrika + $countcucikering + $countsetrika + $countkarpet;

        $pdf= \Barryvdh\DomPDF\Facade\Pdf::loadView('Transaksi.cetak', compact('daftar_pesanan',
                'total_pesanan','periode','countkirim','countambil','pendapatan','cucikering','cucibasah','cucisetrika','setrika','karpet','countcucikering','countcucibasah','countcucisetrika','countsetrika','countkarpet','countpesanan'));

        return $pdf->download('Laporan pesanan'.$periode.'.pdf');

        


    }

}