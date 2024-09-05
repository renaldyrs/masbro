<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\PesananChart;
use App\Charts\PendapatanChart;
use DB;


class PemilikController extends Controller
{
    //
    public function halpemilik(PendapatanChart $pedapatannchart , PesananChart $pesananchart)
    {
        
        return view('Pemilik.halamanpemilik',['chart' => $pesananchart->build(), 'chart2' => $pedapatannchart->build()]);
    }

    public function dataakun()
    {
        $akun = DB::table('akun')->orderBy('kode_akun', 'asc')->get();
        return View('Pemilik.akun', ['akun' => $akun]);
    }

    public function tambahakun(Request $request)
    {
        DB::table('akun')->insert([
            'nama_akun' => $request->namaakun,
            'kode_akun' => $request->kodeakun,
            
        ]);
        return redirect('data-akun');
    }

    public function hapusakun($id)
    {
        DB::table('akun')->where('id', $id)->delete();
        return redirect('data-akun');
    }

    public function hapuspel($id)
    {
        DB::table('pelanggan')->where('id', $id)->delete();
        return redirect('data-pelanggan');
    }


    public function editpel($id)
    {
        $pelanggan = DB::table('pelanggan')->where('id', $id)->get();
        return view('Admin.haleditpelanggan', ['pelanggan' => $pelanggan]);
    }

    public function updatepel(Request $request)
    {
        DB::table('pelanggan')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $request->nohp,
            'kelamin' => $request->kelamin
        ]);
        return redirect('data-pelanggan');
    }
}
