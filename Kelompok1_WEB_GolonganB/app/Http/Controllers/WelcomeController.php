<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Layanan;

class WelcomeController extends Controller
{
    //
    public function index(){
        // $hash = new Hashids();
        // $layanans=Layanan::inRandomOrder()->orderBy('id', 'DESC')->paginate(5);
        // return view('welcome', compact('layanans', 'hash'));

        // $user = User::where('id', $id)->first();
        return view('welcome');
    }
}
