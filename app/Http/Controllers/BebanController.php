<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beban;
use App\Models\Jurnal;
use DB;

class BebanController extends Controller
{
    //
    public function __construct(){
        $this->middleware("auth");
    }

    public function beban()
    {
        $beban = DB::table('beban')->paginate(10);
        $akun = DB::table('akun')->whereBetween('kode_akun', ['400', '499'])->get();
        return View('Master.Beban-data', ['beban' => $beban, 'akun' => $akun]);
    }

    public function tambahbeban(Request $request)
    {

        DB::table('beban')->insert([
            'kode' => $request->kode,
            'keterangan' => $request->keterangan,
            'biaya' => $request->biaya,
            'jumlah' => $request->jumlah,
            'total' => $request->total
        ]);

        $jurnal = new Jurnal();

        $jurnal->id_akun = $request->id_akun;
        $jurnal->keterangan = $request->keterangan;
        $jurnal->debit = $request->biaya;
        $jurnal->kredit = 0;
        $jurnal->save();

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

        return view('Master.Beban-edit', ['beban' => $beban]);

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

    public function getakunbeban(Request $request){

        $akun = DB::table('akun')->where('id', $request->id)->first();
        return response()->json($akun);
    }
}
