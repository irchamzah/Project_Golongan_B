<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Models\Category;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index(){
        $hash = new Hashids();

        $layanans=Layanan::orderBy('id', 'DESC')->paginate(5);
        return view('back.layanan.manage.index', compact('layanans', 'hash'));
    }

    
    public function create()
    {
        $categories=Category::get();
        return view('back.layanan.manage.create', compact('categories'));        
    }

    public function store(Request $request)
    {
        // validasi dan kustom pesan peringatan
        $rules=[
            'category'=>'required',
            'namapj'=>'required|min:2|max:50',
            'alamat'=>'required|min:2|max:200',
            'notelp'=>'required|min:2|max:20',
            'file'=>'required|max:5000|mimes:jpeg,png,jpg',
            'tanggaljemput'=>'required|min:8|max:20',
            'statuspesanan'=>'required|min:2|max:20',
            'pendapatan'=>'required',
        ];
        $message=[
            'category.required'=>' Kategori tidak boleh kosong',

            'namapj.required'=>' Nama Penanggung Jawab tidak boleh kosong',
            'namapj.min'=>' Nama Penanggung Jawab terlalu pendek',
            'namapj.max'=>' Nama Penanggung Jawab terlalu panjang',

            'alamat.required'=>' Alamat tidak boleh kosong',
            'alamat.min'=>' Alamat terlalu pendek',
            'alamat.max'=>' Alamat terlalu panjang',

            'notelp.required'=>' Nomor Telepon tidak boleh kosong',
            'notelp.min'=>' Nomor Telepon terlalu pendek',
            'notelp.max'=>' Nomor Telepon terlalu panjang',

            'file.required'=>' File tidak boleh kosong',
            'file.max'=>' Ukuran File terlalu besar',

            'tanggaljemput.required'=>' Tanggal Jemput tidak boleh kosong',
            'tanggaljemput.min'=>' Tanggal Jemput terlalu pendek',
            'tanggaljemput.max'=>' Tanggal Jemput terlalu panjang',

            'statuspesanan.required'=>' Status Pesanan tidak boleh kosong',
            'statuspesanan.min'=>' Status Pesanan terlalu pendek',
            'statuspesanan.max'=>' Status Pesanan terlalu panjang',

            'pendapatan.required'=>' Pendapatan tidak boleh kosong',
            'pendapatan.min'=>' Pendapatan terlalu pendek',
            'pendapatan.max'=>' Pendapatan terlalu panjang',
        ];
        $this->validate($request,$rules,$message);

        //mengubah nama file foto yang diupload
        $fileName=time().'.'.$request->file->extension();
        $request->file('file')->move(public_path('img/fotopesanan'), $fileName);
        $layanans=Layanan::create([
            'category_id'=>$request->category,
            'namapj'=>$request->namapj,
            'alamat'=>$request->alamat,
            'notelp'=>$request->notelp,
            'file'=>$fileName,
            'tanggaljemput'=>$request->tanggaljemput,
            'statuspesanan'=>$request->statuspesanan,
            'pendapatan'=>$request->pendapatan,
        ]);

        return back()->with('success', 'posting Data Sukses!');

    }

    public function edit($id){

        $hash = new Hashids();

        $categories=Category::get();
        $layanans=Layanan::find($hash->decodeHex($id));
        return view('back.layanan.manage.edit',compact('categories', 'layanans', 'hash'));
    } 

    

    public function update(Request $request, $id)
    {
        $rules=[
            'category'=>'required',
            'namapj'=>'required|min:2|max:50',
            'alamat'=>'required|min:2|max:200',
            'notelp'=>'required|min:2|max:20',
            'file'=>'required|max:5000|mimes:jpeg,png,jpg',
            'tanggaljemput'=>'required|min:8|max:20',
            'statuspesanan'=>'required|min:2|max:20',
            'pendapatan'=>'required',
        ];
        $message=[
            'category.required'=>' Kategori tidak boleh kosong',

            'namapj.required'=>' Nama Penanggung Jawab tidak boleh kosong',
            'namapj.min'=>' Nama Penanggung Jawab terlalu pendek',
            'namapj.max'=>' Nama Penanggung Jawab terlalu panjang',

            'alamat.required'=>' Alamat tidak boleh kosong',
            'alamat.min'=>' Alamat terlalu pendek',
            'alamat.max'=>' Alamat terlalu panjang',

            'notelp.required'=>' Nomor Telepon tidak boleh kosong',
            'notelp.min'=>' Nomor Telepon terlalu pendek',
            'notelp.max'=>' Nomor Telepon terlalu panjang',

            'file.required'=>' File tidak boleh kosong',
            'file.max'=>' Ukuran File terlalu besar',

            'tanggaljemput.required'=>' Tanggal Jemput tidak boleh kosong',
            'tanggaljemput.min'=>' Tanggal Jemput terlalu pendek',
            'tanggaljemput.max'=>' Tanggal Jemput terlalu panjang',

            'statuspesanan.required'=>' Status Pesanan tidak boleh kosong',
            'statuspesanan.min'=>' Status Pesanan terlalu pendek',
            'statuspesanan.max'=>' Status Pesanan terlalu panjang',

            'pendapatan.required'=>' Pendapatan tidak boleh kosong',
            'pendapatan.min'=>' Pendapatan terlalu pendek',
            'pendapatan.max'=>' Pendapatan terlalu panjang',
        ];
        $this->validate($request,$rules,$message);

        $layanans=Layanan::whereId($id)->first();
        if(\File::exists(public_path('img/fotopesanan/').$layanans->file)){
            \File::delete(public_path('img/fotopesanan/').$layanans->file);
        }
        $fileName=time().'.'.$request->file->extension();
        $request->file('file')->move(public_path('img/fotopesanan'), $fileName);

        $layanans->update([
            'category_id'=>$request->category,
            'namapj'=>$request->namapj,
            'alamat'=>$request->alamat,
            'notelp'=>$request->notelp,
            'file'=>$fileName,
            'tanggaljemput'=>$request->tanggaljemput,
            'statuspesanan'=>$request->statuspesanan,
            'pendapatan'=>$request->pendapatan,
        ]);

        return back()->with('success', 'Ubah Data Sukses!');
    }

    public function destroy($id)
    {
        $hash = new Hashids();

        $layanans=Layanan::whereId($hash->decodeHex($id))->first();
        if(\File::exists(public_path('img/fotopesanan/').$layanans->file)){
            \File::delete(public_path('img/fotopesanan/').$layanans->file);
        }
        Layanan::whereId($hash->decodeHex($id))->delete();
        return back()->with('success', 'Hapus data sukses!');
    }

    public function show($id)
    {
        $hash = new Hashids();

        $layanans=Layanan::whereId($hash->decodeHex($id))->first();
        return view('back.layanan.show', compact('layanans', 'hash'));
    }

    
}
