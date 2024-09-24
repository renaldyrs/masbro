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
        
        return view('Dashboard',['chart' => $pesananchart->build(), 'chart2' => $pedapatannchart->build()]);
    }


}
