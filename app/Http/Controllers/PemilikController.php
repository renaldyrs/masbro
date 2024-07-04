<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\PesananChart;
use App\Charts\PendapatanChart;

class PemilikController extends Controller
{
    //
    public function halpemilik(PendapatanChart $pedapatannchart , PesananChart $pesananchart)
    {
        
        return view('Pemilik/halamanpemilik',['chart' => $pesananchart->build(), 'chart2' => $pedapatannchart->build()]);
    }
}
