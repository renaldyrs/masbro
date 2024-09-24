<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Models\Jurnal;
use Illuminate\Support\Facades\DB;

class JenisController extends Controller
{
    //

    public function __construct(){
        $this->middleware("auth");
    }

    public function jenis()
    {
        $jenis = DB::table('jenis')->paginate(10);
        return View('Master.Jenis-data', ['jenis' => $jenis]);
    }

    public function tambahjenis(Request $request)
    {
        $id=DB::table('jenis')->max('id')+1;
        $addjenis = new Jenis();
        $addjenis->id = $id;
        $addjenis->jenis = $request->jenis;
        $addjenis->kg = $request->kg;
        $addjenis->hari = $request->hari;
        $addjenis->harga = $request->harga;
        $addjenis->save();
        return redirect('data-jenis');
    }

    public function hapusjenis($id)
    {
        DB::table('jenis')->where('id', $id)->delete();
        return redirect('.data-jenis');
    }

    public function editjenis($id)
    {
        $jenis = DB::table('jenis')->where('id', $id)->get();
        return view('Master.Jenis-edit', ['jenis' => $jenis]);
    }

    public function updatejenis(Request $request)
    {
        DB::table('jenis')->where('id', $request->id)->update([
            'jenis' => $request->jenis,
            'kg' => $request->kg,
            'hari' => $request->hari,
            'harga' => $request->harga
        ]);
        return redirect('data-jenis');
    }

}
