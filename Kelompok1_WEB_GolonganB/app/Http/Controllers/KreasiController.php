<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daurulang;

class KreasiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $daurulangs = Daurulang::paginate(20);
        // dd($daurulangs);
        return view('kreasi.index', compact('daurulangs'));
    }

    public function show($id)
    {
        $daurulang = Daurulang::whereId($id)->first();
        return view('kreasi.show', compact('daurulang'));
    }
}
