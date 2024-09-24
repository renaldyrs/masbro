<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\PesananChart;
use App\Charts\PendapatanChart;
use DB;

class DashboardController extends Controller
{
    //

    public function dashboard(PendapatanChart $pedapatannchart , PesananChart $pesananchart)
    {
        
        return view('Dashboard',['chart' => $pesananchart->build(), 'chart2' => $pedapatannchart->build()]);
    }

}
