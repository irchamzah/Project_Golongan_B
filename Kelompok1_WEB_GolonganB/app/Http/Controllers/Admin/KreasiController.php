<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Hashids\Hashids;
use App\Models\Category;
use App\Models\Layanan;
use App\Models\Kreasi;
use App\Models\Admin;
use App\Models\LayananDetail;
use App\Models\Daurulang;

class KreasiController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('adminMiddle');
    }

    public function index(Request $request){
        // $hash = new Hashids();
        if($request->has('cari')){
            $daurulangs = Daurulang::where('nama', 'LIKE', '%'.$request->cari.'%')->get();
        }else{
            $daurulangs=Daurulang::orderBy('id', 'DESC')->paginate(20);
        }
        
        return view('back.kreasi.manage.index', compact('daurulangs'));
    }

    public function create()
    {
        return view('back.kreasi.manage.create');
    }

    public function store(Request $request)
    {
        $rules=[
            'nama'=>'required',
            'foto'=>'required|max:5000|mimes:jpeg,png,jpg',
            'keterangan'=>'required',
            'keterangan_detail'=>'required',
        ];

        $message=[
            'nama.required'=>' Kategori tidak boleh kosong',

            'foto.required'=>' File tidak boleh kosong',
            'foto.max'=>' Ukuran File terlalu besar',

            'keterangan.required'=>' keterangan tidak boleh kosong',

            'keterangan_detail.required'=>' keterangan detail tidak boleh kosong',
        ];
        $this->validate($request,$rules,$message);

        $daurulang = new Daurulang;
        $daurulang->nama = $request->nama;
        //mengubah nama file foto yang diupload
        $fileName=time().'.'.$request->foto->extension();
        $request->file('foto')->move(public_path('img/fotokreasi'), $fileName);
        $daurulang->foto = $fileName;
        $daurulang->keterangan = $request->keterangan;
        $daurulang->keterangan_detail = $request->keterangan_detail;
        $daurulang->save();

        return back()->with('success', 'posting Data Sukses!');
    }

    public function edit($id)
    {
        $daurulang=Daurulang::find($id);

        return view('back.kreasi.manage.edit', compact('daurulang'));
    } 

    

    public function update(Request $request, $id)
    {
        $rules=[
            'nama'=>'required',
            'foto'=>'max:5000|mimes:jpeg,png,jpg',
            'keterangan'=>'required',
            'keterangan_detail'=>'required',
        ];

        $message=[
            'nama.required'=>' Kategori tidak boleh kosong',

            // 'foto.required'=>' File tidak boleh kosong',
            'foto.max'=>' Ukuran File terlalu besar',

            'keterangan.required'=>' keterangan tidak boleh kosong',

            'keterangan_detail.required'=>' keterangan detail tidak boleh kosong',
        ];
        $this->validate($request,$rules,$message);

        $daurulang = Daurulang::whereId($id)->first();
        $daurulang->nama = $request->nama;
        if(!empty($request->foto))
        {
            if(\File::exists(public_path('img/fotokreasi/').$daurulang->foto))
            {
                \File::delete(public_path('img/fotokreasi/').$daurulang->foto);
            }
            $fileName=time().'.'.$request->foto->extension();
            $request->file('foto')->move(public_path('img/fotokreasi'), $fileName);
            $daurulang->foto = $fileName;
        }
        $daurulang->keterangan = $request->keterangan;
        $daurulang->keterangan_detail = $request->keterangan_detail;
        $daurulang->update();

        return back()->with('success', 'Update Data Sukses!');
    }

    public function destroy($id)
    {
        $daurulang = Daurulang::whereId($id)->first();
        if(\File::exists(public_path('img/fotokreasi/').$daurulang->foto)){
            \File::delete(public_path('img/fotokreasi/').$daurulang->foto);
        }
        Daurulang::whereId($id)->delete();
        return back()->with('success', 'Hapus data sukses!');
    }

}
