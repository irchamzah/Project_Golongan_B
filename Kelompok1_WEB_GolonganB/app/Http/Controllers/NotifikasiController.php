<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LayananDetail;
use App\Models\User;
use App\Models\Notifikasi;
use Auth;

class NotifikasiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $notifikasis = Notifikasi::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(20);
        return view('notifikasi.index', compact('notifikasis'));
    }
}
