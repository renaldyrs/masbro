<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class utamacontroller extends Controller
{
    public function halutama(){
        return view ('halaman-utama');
    }
}
