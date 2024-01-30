<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Category;
use App\Models\Layanan;
use App\Models\LayananDetail;
use App\Models\User;
use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminMiddle');
    }

    public function index(Request $request)
    {
        if($request->has('cari')){
            $notifikasis = Notifikasi::where('title', 'LIKE', '%'.$request->cari.'%')->get();
        }else{
            $notifikasis = Notifikasi::orderBy('id','desc')->paginate(20);
        }

        return view('back.notifikasi.manage.index', compact('notifikasis'));

    }

    public function destroy($id)
    {
        Notifikasi::whereId($id)->delete();
        return back()->with('success', 'Hapus data sukses!');
    }

    public function create()
    {
        $users = User::orderBy('id','desc')->paginate(20);
        return view('back.notifikasi.manage.create', compact('users'));
    }

    public function store(Request $request)
    {
        $rules=[

            'user'=>'required',
            'title'=>'required',
            'keterangan'=>'required',
        ];

        $message=[
            'user.required'=>' Harap pilih User terlebih dahulu',

            'title.required'=>' Judul tidak boleh kosong',

            'keterangan.required'=>' keterangan tidak boleh kosong',
        ];
        $this->validate($request,$rules,$message);

        $notifikasi = new Notifikasi;
        $notifikasi->user_id = $request->user;
        $notifikasi->title = $request->title;
        $notifikasi->keterangan = $request->keterangan;
        $notifikasi->save();

        return back()->with('success', 'posting Data Sukses!');
    }

}
