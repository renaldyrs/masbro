<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    //
    public function __construct(){
        $this->middleware("auth");
    }

    public function pelanggan()
    {
        $pelanggan = DB::table('pelanggan')->Paginate(10);
        return view('Master.Pelanggan-data', ['pelanggan' => $pelanggan]);
    }

    public function tambahpelanggan(Request $request)
    {
        $nohp =$request->nohp;
        DB::table('pelanggan')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nohp' => $nohp,
            'kelamin' => $request->kelamin
        ]);
        return redirect('data-pelanggan');
    }

    public function hapuspel($id)
    {
        DB::table('pelanggan')->where('id', $id)->delete();
        return redirect()->back();
    }


    public function editpel($id)
    {
        $pelanggan = DB::table('pelanggan')
        ->where('id', $id)->get();
        return view('Master.Pelanggan-edit', ['pelanggan' => $pelanggan]);
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
