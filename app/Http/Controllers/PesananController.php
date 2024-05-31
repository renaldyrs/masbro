<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Redirect;

class PesananController extends Controller
{
    public function halpesanan(Request $request){

        return view('Admin/halpesanan');
    }


    
}
