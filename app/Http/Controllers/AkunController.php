<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use App\Models\Jurnal;
use Illuminate\Support\Facades\DB;

class AkunController extends Controller
{
    //
    public function __construct(){
        $this->middleware("auth");
    }

    public function akun()
    {
        $akun = DB::table('akun')
        ->orderBy('kode_akun', 'asc')
        ->Paginate(10);
        return View('Master.Akun-data', ['akun' => $akun]);
    }

    public function tambahakun(Request $request)
    {
        DB::table('akun')->insert([
            'nama_akun' => $request->namaakun,
            'kode_akun' => $request->kodeakun,
            
        ]);
        return redirect('data-akun');
    }

    public function updateakun(Request $request)
    {
        DB::table('akun')->where('id', $request->id)->update([
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
}
