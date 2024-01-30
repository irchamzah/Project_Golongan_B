<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $user = User::where('id', $id)->first();

        return view('pesan.index', compact(user));
    }
}
