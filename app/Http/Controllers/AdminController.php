<?php

namespace App\Http\Controllers;

use App\Charts\PesananChart;
use App\Charts\PendapatanChart;
use App\Models\Jenis;
use App\Models\Pelanggan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Redirect;
use Auth;
use Session;
use PDF;

class AdminController extends Controller
{
    //

    public function __construct(){
        $this->middleware("auth");
    }

    
    public function haladmin(PesananChart $pesananchart, PendapatanChart $pedapatannchart)
    {

        $tgl = date("Y-m-d");


        // $pesanan = DB::table('pesanan')
        // ->select('id',DB::raw('count(*) as hari'))
        // ->where('tgltransaksi', $tgl)
        // ->count('id')
        // ;

        $pesanan = DB::table('pesanan')->where('tgltransaksi', $tgl)->get();

        return view('Admin\halamanadmin',['pesanan' => $pesanan,'chart' => $pesananchart->build(), 'chart2' => $pedapatannchart->build()]);
    }

    public function datapelanggan()
    {
        $pelanggan = DB::table('pelanggan')->get();
        return view('Admin\haldatapelanggan', ['pelanggan' => $pelanggan]);
    }

    public function datajenis()
    {
        $jenis = DB::table('jenis')->get();
        return View('Admin\haldatajenis', ['jenis' => $jenis]);
    }

    public function databeban()
    {
        $beban = DB::table('beban')->get();
        return View('Admin\haldatabeban', ['beban' => $beban]);
    }

    public function datametode()
    {
        $metode = DB::table('metodepembayaran')->get();
        return View('Admin\haldatametode', ['metodepembayaran' => $metode]);
    }

    //------------------------------------------------PELANGGAN-----------------------------------------
    public function tambahpelanggan(Request $request)
    {
        DB::table('pelanggan')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'kelamin' => $request->kelamin
        ]);
        return redirect('/data-pelanggan');
    }

    public function hapuspel($id)
    {
        DB::table('pelanggan')->where('id', $id)->delete();
        return redirect('/data-pelanggan');
    }


    public function editpel($id)
    {
        $pelanggan = DB::table('pelanggan')->where('id', $id)->get();
        return view('Admin\haleditpelanggan', ['pelanggan' => $pelanggan]);
    }

    public function updatepel(Request $request)
    {
        DB::table('pelanggan')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'kelamin' => $request->kelamin
        ]);
        return redirect('/data-pelanggan');
    }


    //----------------------------------------------------------------------------JENIS----------------------------------------------
    public function tambahjenis(Request $request)
    {
        $addjenis = new Jenis();
        $addjenis->jenis = $request->jenis;
        $addjenis->kg = $request->kg;
        $addjenis->hari = $request->hari;
        $addjenis->harga = $request->harga;
        $addjenis->save();
        return redirect('/data-jenis');
    }

    public function hapusjenis($id)
    {
        DB::table('jenis')->where('id', $id)->delete();
        return redirect('/data-jenis');
    }

    public function editjenis($id)
    {
        $jenis = DB::table('jenis')->where('id', $id)->get();
        return view('Admin\haleditjenis', ['jenis' => $jenis]);
    }

    public function updatejenis(Request $request)
    {
        DB::table('jenis')->where('id', $request->id)->update([
            'jenis' => $request->jenis,
            'kg' => $request->kg,
            'hari' => $request->hari,
            'harga' => $request->harga
        ]);
        return redirect('/data-jenis');
    }

    //---------------------------------------------------------------metode-------------------------------------------
    public function tambahmetode(Request $request)
    {
        DB::table('metodepembayaran')->insert([
            'namabank' => $request->namabank,
            'kodebank' => $request->kodebank
        ]);

        return redirect('/data-metode');
    }

    public function hapusmetode($id)
    {
        DB::table('metodepembayaran')->where('id', $id)->delete();
        return redirect('/data-metode');
        ;
    }

    public function editmetode($id)
    {
        $metode = DB::table('metodepembayaran')->where('id', $id)->get();
        return view('Admin\haleditmetode', ['metodepembayaran' => $metode]);
    }

    public function updatemetode(Request $request)
    {
        DB::table('metodepembayaran')->where('id', $request->id)->update([
            'namabank' => $request->namabank,
            'kodebank' => $request->kodebank
        ]);
        return redirect('/data-metode');
    }

    //------------------------------------------------------------------------------Beban--------------------------------------------------

    public function tambahbeban(Request $request)
    {

        DB::table('beban')->insert([
            'kode' => $request->kode,
            'keterangan' => $request->keterangan,
            'biaya' => $request->biaya,
            'jumlah' => $request->jumlah,
            'total' => $request->total
        ]);

        return redirect('data-beban');
    }

    public function hapusbeban($id)
    {

        DB::table('beban')->where('idbeban', $id)->delete();

        $beban = DB::table('beban')->get();

        return redirect('data-beban');

    }


    public function editbeban($id)
    {

        $beban = DB::table('beban')->where('id', $id)->get();

        return view('Admin\haleditbeban', ['beban' => $beban]);

    }

    public function updatebeban(Request $request)
    {
        DB::table('beban')->where('id', $request->id)->update([
            'kode'=> $request->kode,
            'keterangan' => $request->keterangan,
            'biaya' => $request->biaya,
            'jumlah' => $request->jumlah,
            'total' => $request->total
        ]);

        return redirect('data-beban');

    }


    public function laporan(){
        $pesanan = DB::table('pesanan')->get();
        $pelanggan = DB::table('pelanggan')->get();
        $jenis = DB::table('jenis')->get();
        

        return view('Admin/laporan',['pesanan'=>$pesanan,'pelanggan'=>$pelanggan,'jenis'=>$jenis]);
        
    }

    public function cetak(){
        $laporan = DB::table('pesanan')->get();

        $pdf= PDF::loadView('Admin/invoice');
        return $pdf->download('laporan.pdf');
    }

}


