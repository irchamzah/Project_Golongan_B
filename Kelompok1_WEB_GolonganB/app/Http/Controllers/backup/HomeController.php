<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Category;
use App\Models\Layanan;


class HomeController extends Controller
{
    public function index()
    {
        $hash = new Hashids();
        $layanans=Layanan::inRandomOrder()->orderBy('id', 'DESC')->paginate(5);
        return view('home', compact('layanans', 'hash'));
    }
}
