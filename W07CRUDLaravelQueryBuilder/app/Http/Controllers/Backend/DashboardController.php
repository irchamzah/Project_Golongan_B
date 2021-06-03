<?php

namespace App\Http\Controllers;  //
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;  //
use Illuminate\Support\Facades\DB;  //
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }
}
