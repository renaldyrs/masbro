<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metode;

use Illuminate\Support\Facades\DB;

class MetodeController extends Controller
{
    //
    public function __construct(){
        $this->middleware("auth");
    }

    public function metode()
    {
        $metode = DB::table('metodepembayaran')->paginate(10);
        return View('Master.Metode-data', ['metodepembayaran' => $metode]);
    }

    public function tambahmetode(Request $request)
    {
        DB::table('metodepembayaran')->insert([
            'namabank' => $request->namabank,
            'kodebank' => $request->kodebank
        ]);

        return redirect('.data-metode');
    }

    public function hapusmetode($id)
    {
        DB::table('metodepembayaran')->where('id', $id)->delete();
        return redirect('.data-metode');
        
    }

    public function editmetode($id)
    {
        $metode = DB::table('metodepembayaran')->where('id', $id)->get();
        return view('Master.Metode-edit', ['metodepembayaran' => $metode]);
    }

    public function updatemetode(Request $request)
    {
        DB::table('metodepembayaran')->where('id', $request->id)->update([
            'namabank' => $request->namabank,
            'kodebank' => $request->kodebank
        ]);
        return redirect('.data-metode');
    }
}
