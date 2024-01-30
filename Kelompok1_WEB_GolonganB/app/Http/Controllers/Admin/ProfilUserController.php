<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LayananDetail;
use Auth;

class ProfilUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('adminMiddle');
    }

    public function index(Request $request)
    {
        // dd($request->all());
        if($request->has('cari')){
            $users = User::where('name', 'LIKE', '%'.$request->cari.'%')->get();
        }else{
            $users = User::paginate(20);
        }
        return view('back.profiluser.manage.index', compact('users'));

    }

    public function detail($id)
    {
        $layanan_details=LayananDetail::where('user_id', $id)->orderBy('id','desc')->paginate(20);
        $user = User::whereId($id)->first();
        return view('back.profiluser.manage.detail', compact('user', 'layanan_details'));
    }
}
