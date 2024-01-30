<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Hashids\Hashids;
use App\Models\Category;
use App\Models\Layanan;
use App\Models\Notifikasi;
use App\Models\Admin;
use App\Models\User;
use App\Models\LayananDetail;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('adminMiddle');
    }

    public function index(Request $request){
        // $hash = new Hashids();

        if($request->has('cari')){
            $layanan_details = LayananDetail::where('id', 'LIKE', '%'.$request->cari.'%')->get();
        }else{
            $layanan_details=LayananDetail::orderBy('id', 'DESC')->paginate(20);
        }


        return view('back.home', compact('layanan_details'));
    }

    public function konfirmasi($id){
        // $hash = new Hashids();
        
        $layanan_detail=LayananDetail::find($id);
        return view('back.layanan.manage.edit', compact('layanan_detail'));
    }

    public function pesanan($id)
    {
        $layanan_detail = LayananDetail::whereId($id)->first();

        $layanan_detail->update([
            'status_id' => 2,
        ]);
        $notifikasi = new Notifikasi;
        $notifikasi->user_id = $layanan_detail->user_id;
        // $notifikasi->layanan_detail_id = $layanan_detail->id;
        $notifikasi->title = 'PESANAN SUDAH DIKONFIRMASI!';
        $notifikasi->keterangan = 'Pesananmu Sudah dikonfirmasi!, Diharapkan Penanggung Jawab sedang berada di Alamat yang Terkirim';
        $notifikasi->save();

        return back()->with('success', 'Status Pesanan berhasil Dikonfirmasi!, SEGERA JEMPUT SAMPAHNYA!');

    }

    public function tolak(Request $request,$id)
    {
        $rules=[
            'keterangantolak'=>'required',
        ];

        $message=[
            'keterangantolak.required'=>' Keterangan tidak boleh kosong',
        ];
        $this->validate($request,$rules,$message);


        $layanan_detail = LayananDetail::whereId($id)->first();
        $layanan_detail->update([
            'status_id' => 4,
        ]);
        $notifikasi = new Notifikasi;
        $notifikasi->user_id = $layanan_detail->user_id;
        // $notifikasi->layanan_detail_id = $layanan_detail->id;
        $notifikasi->title = 'PESANAN DITOLAK!';
        $notifikasi->keterangan = $request->keterangantolak;
        $notifikasi->save();


        return back()->with('success', 'Status Pesanan berhasil Ditolak!');

    }


    //ini ketika isi pendapatan
    public function update(Request $request, $id)
    {
        // dd($request);
        $rules=[
            'pendapatan'=>'required',
        ];

        $message=[
            'pendapatan.required'=>' Pendapatan tidak boleh kosong',
        ];
        $this->validate($request,$rules,$message);
        
        $layanan_detail = LayananDetail::whereId($id)->first();
        $layanan_detail->update([
            'status_id' => 3,
            'pendapatan' => $request->pendapatan,
        ]);
        $notifikasi = Notifikasi::where('user_id', $layanan_detail->user_id)->first();
        $notifikasi->title = 'PESANAN TELAH SELESAI!';
        $notifikasi->keterangan = 'Pesananmu Telah Selesai!, Terimakasih telah Menggunakan Aplikasi kami!';
        $notifikasi->update();

        return back()->with('success', 'Input Pendapatan berhasil disimpan!');
    }

    public function destroy($id)
    {
        $layanan_detail = LayananDetail::whereId($id)->first();
        if(\File::exists(public_path('img/fotopesanan/').$layanan_detail->file)){
            \File::delete(public_path('img/fotopesanan/').$layanan_detail->file);
        }
        LayananDetail::whereId($id)->delete();
        return back()->with('success', 'Hapus data sukses!');
    }

    

}
