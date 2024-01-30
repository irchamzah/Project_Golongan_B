<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Hashids\Hashids;
use App\Models\Layanan;
use App\Models\Category;
use App\Models\LayananDetail;
use App\Models\User;
use Auth;

class LayananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::get();
        $user = User::where('id', Auth::user()->id)->first();
        $layanans = Layanan::where('user_id', Auth::user()->id)->paginate(20);
        $layanan_details = LayananDetail::where('user_id', Auth::user()->id)->orderBy('id','desc')->paginate(20);
        
        return view('layanan.manage.index', compact('categories', 'user', 'layanans', 'layanan_details'));
    }

    public function create()
    {
        $categories=Category::get();
        $users = User::where('id', Auth::user()->id)->first();

        return view('layanan.manage.create', compact('users', 'categories'));
    }

    public function store(Request $request, $id)
    {
        $rules=[
            'category'=>'required',
            'file'=>'required|max:5000|mimes:jpeg,png,jpg',
            'tanggaljemput'=>'required|after:tomorrow',
            'keterangan'=>'required',
        ];

        $message=[
            'category.required'=>' Kategori tidak boleh kosong',

            'file.required'=>' File tidak boleh kosong',
            'file.max'=>' Ukuran File terlalu besar',
            'file.mimes'=>' Jenis File Harus Berformat: jpeg,png,jpg',

            'tanggaljemput.required'=>' Tanggal Jemput tidak boleh kosong',
            'tanggaljemput.after'=>' Tanggal Jemput tidak boleh Hari ini atau Sebelumnya',

            'keterangan.required'=>' Keterangan tidak boleh kosong',
        ];
        $this->validate($request,$rules,$message);

        //simpan ke database layanan
        $user = User::where('id', Auth::user()->id)->first();
        $layanan = new Layanan;
        $layanan->user_id = Auth::user()->id;
        $layanan->save();

        // simpan ke database layanan detail
        $id_layanan_baru = Layanan::where('user_id', Auth::user()->id)->first();
        $layanan_detail = new LayananDetail;
        $layanan_detail->layanan_id = $id_layanan_baru->id;
        $layanan_detail->category_id = $request->category;
        $layanan_detail->user_id = Auth::user()->id;

        //mengubah nama file foto yang diupload
        $fileName=time().'.'.$request->file->extension();
        $request->file('file')->move(public_path('img/fotopesanan'), $fileName);
        
        $layanan_detail->file = $fileName;
        $layanan_detail->path = $fileName;
        $layanan_detail->tanggaljemput = $request->tanggaljemput;
        $layanan_detail->keterangan = $request->keterangan;
        $layanan_detail->status_id = 1;
        $layanan_detail->pendapatan = 0;
        $layanan_detail->save();

        return back()->with('success', 'posting Data Sukses!');
    }

    public function edit($id)
    {
        $categories=Category::get();
        $users = User::where('id', Auth::user()->id)->first();
        $layanan_details=LayananDetail::find($id);

        return view('layanan.manage.edit', compact('layanan_details', 'categories', 'users'));
    } 

    

    public function update(Request $request, $id)
    {
        $rules=[
            // 'category'=>'required',
            'file'=>'max:5000|mimes:jpeg,png,jpg',
            'tanggaljemput'=>'required|after:tomorrow',
            'keterangan'=>'required',
        ];

        $message=[
            // 'category.required'=>' Kategori tidak boleh kosong',

            // 'file.required'=>' File tidak boleh kosong',
            'file.max'=>' Ukuran File terlalu besar',
            'file.mimes'=>' Jenis File Harus Berformat: jpeg,png,jpg',

            'tanggaljemput.required'=>' Tanggal Jemput tidak boleh kosong',
            'tanggaljemput.after'=>' Tanggal Jemput tidak boleh Hari ini atau Sebelumnya',

            'keterangan.required'=>' Keterangan tidak boleh kosong',
        ];
        $this->validate($request,$rules,$message);

        // simpan ke database layanan detail
        $layanan_detail = LayananDetail::whereId($id)->first();
        $layanan_detail->tanggaljemput = $request->tanggaljemput;
        $layanan_detail->keterangan = $request->keterangan;
        if(!empty($request->category))
        {
            $layanan_detail->category_id = $request->category;
        }

        if(!empty($request->file))
        {
            // menghapus file yang ada di storage
            if(\File::exists(public_path('img/fotopesanan/').$layanan_detail->file))
            {
                \File::delete(public_path('img/fotopesanan/').$layanan_detail->file);
            }
            //mengubah nama file foto yang diupload
            $fileName=time().'.'.$request->file->extension();
            $request->file('file')->move(public_path('img/fotopesanan'), $fileName);

            $layanan_detail->file = $fileName;
        }

        $layanan_detail->update();

        return back()->with('success', 'Ubah Data Sukses!');

        // $layanan_detail->update([
        //     // 'layanan_id' => $id_layanan_baru->id,
        //     // // 'category_id' => $request->category,
        //     // 'user_id' => Auth::user()->id,
            
        //     'tanggaljemput' => $request->tanggaljemput,
        //     'keterangan' => $request->keterangan,
        //     'pendapatan' => 0,
        // ]);
    }

    public function destroy($id)
    {
        // $hash = new Hashids();

        $layanan_detail = LayananDetail::whereId($id)->first();
        if(\File::exists(public_path('img/fotopesanan/').$layanan_detail->file)){
            \File::delete(public_path('img/fotopesanan/').$layanan_detail->file);
        }
        LayananDetail::whereId($id)->delete();
        return back()->with('success', 'Hapus data sukses!');
    }

    public function show($id)
    {
        // // $hash = new Hashids();

        // $layanan_detail = LayananDetail::whereId($id)->first();
        // return view('layanan.show', compact('layanans_detail'));
    }

    

}
