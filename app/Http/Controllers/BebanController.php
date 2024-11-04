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
        $akun = DB::table('akun')
       
        ->whereBetween('kode_akun', ['300', '499'])->get();
        return View('Master.Beban-data', ['beban' => $beban, 'akun' => $akun]);
    }

    public function tambahbeban(Request $request)
    {

        $beban = DB::table('beban');

        if ($beban == null) {
            $id = 1;
        } else {
            $id = count($beban->get()) + 1;
        }

        $total = $request->biaya * $request->jumlah;

        DB::table('beban')->insert([
            'id' => $id,
            'kode' => $request->kode,
            'keterangan' => $request->keterangan,
            'biaya' => $request->biaya,
            'jumlah' => $request->jumlah,
            'total' => $total
        ]);

        $jurnal = new Jurnal();
        $jurnal->id_beban = $id;
        $jurnal->id_akun = $request->idakun;
        $jurnal->id_pesanan = '0';
        $jurnal->nominal = $total;
        $jurnal->keterangan = $request->keterangan;
        $jurnal->waktu_transaksi = date('Y-m-d');
        $jurnal->tipe = 'd';
        $jurnal->save();

        $jurnal = new Jurnal();
        $jurnal->id_beban = $id;
        $jurnal->id_akun = '1';
        $jurnal->id_pesanan = '0';
        $jurnal->nominal = $total;
        $jurnal->keterangan = $request->keterangan;
        $jurnal->waktu_transaksi = date('Y-m-d');
        $jurnal->tipe = 'k';
        $jurnal->save();

        return redirect('data-beban');
    }

    public function hapusbeban($id)
    {

        DB::table('beban')->where('id', $id)->delete();
        DB::table('jurnal')->where('id_beban', $id)->delete();
        

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
