<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Redirect;
use Auth;
use Session;

class AdminController extends Controller
{
    //
    public function haladmin()
    {
        return view('Admin\halamanadmin');
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
        return redirect('/data-metode');;
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
            'keterangan' => $request->keterangan,
            'biaya' => $request->biaya,
            'jumlah' => $request->jumlah,
            'total' => $request->total
        ]);

        $beban = DB::table('beban')->get();

        return view('Admin\haldatabeban', ['beban' => $beban]);
    }

    public function hapusbeban($id)
    {

        DB::table('beban')->where('id', $id)->delete();

        $beban = DB::table('beban')->get();

        return view('Admin\haldatabeban', ['beban' => $beban]);

    }


    public function editbeban($id)
    {

        $beban = DB::table('beban')->where('id', $id)->get();

        return view('Admin\haleditbeban', ['beban' => $beban]);

    }

    public function updatebeban(Request $request)
    {
        DB::table('beban')->where('id', $request->id)->update([
            'keterangan' => $request->keterangan,
            'biaya' => $request->biaya,
            'jumlah' => $request->jumlah,
            'total' => $request->total
        ]);

        $beban = DB::table('beban')->get();
        return view('Admin\haldatabeban', ['beban' => $beban]);

    }


}


