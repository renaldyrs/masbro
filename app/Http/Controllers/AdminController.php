<?php

namespace App\Http\Controllers;

use App\Charts\PesananChart;
use App\Charts\PendapatanChart;
use App\Models\Jenis;
use App\Models\Pelanggan;
use App\Models\Jurnal;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

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

        return view('Dashboard',['pesanan' => $pesanan,'chart' => $pesananchart->build(), 'chart2' => $pedapatannchart->build()]);
    }

    

    

    

    

    //------------------------------------------------PELANGGAN-----------------------------------------
    


    //----------------------------------------------------------------------------JENIS----------------------------------------------
   

    //---------------------------------------------------------------metode-------------------------------------------
    

    //------------------------------------------------------------------------------Beban--------------------------------------------------

    

    


    

    

    

    public function laporan(){
        $pesanan = DB::table('pesanan')->get();
        $pelanggan = DB::table('pelanggan')->get();
        $jenis = DB::table('jenis')->get();
        

        return view('Admin.laporan',['pesanan'=>$pesanan,'pelanggan'=>$pelanggan,'jenis'=>$jenis]);
        
    }

    public function cetak(){
        $laporan = DB::table('pesanan')->get();

        $pdf= PDF::loadView('Admin.invoice');
        return $pdf->download('laporan.pdf');
    }

}


