<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatusPesananController extends Controller
{
    //
    public function index()
    {
        return view('status.status_pesanan');
    }

    
}
