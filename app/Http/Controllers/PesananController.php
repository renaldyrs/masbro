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
                'pesanan.kode_pesanan as kodepesanan'
            ])
            ->join('pelanggan', 'pelanggan.id', '=', 'pesanan.id_pelanggan')
            ->join('jenis', 'jenis.id', '=', 'pesanan.id_jenis')
            ->join('metodepembayaran', 'metodepembayaran.id', '=', 'pesanan.id_metode')
            ->join('pengiriman', 'pengiriman.id_pesanan', '=', 'pesanan.id')

            ->where([
                ['statuspembayaran', 'like', '%' . $request->statusbayar . '%'],
                ['jenisbayar', 'like', '%' . $request->pembayaran . '%'],
                ['statuslaundry', 'like', '%' . $request->laundry . '%'],
                ['pengiriman', 'like', '%' . $request->pengiriman . '%'],
                ['tgltransaksi', 'like', '%' . $request->date . '%'],
                ['statuslaundry', '!=', 'Sudah Diambil'],
                ['statuslaundry', '!=', 'Sudah Dikirim']
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
                ['tgltransaksi', 'like', '%' . $request->date . '%'],
                
                
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


}