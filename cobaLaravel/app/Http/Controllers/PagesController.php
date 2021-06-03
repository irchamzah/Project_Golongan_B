<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class PagesController extends Controller
{
    
    public function home()
    {
        return view('index');
    }
}
