<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Hashids\Hashids;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class ProfilAdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('adminMiddle');
    }

    public function index(Request $request)
    {
        if($request->has('cari')){
            $admins = Admin::where('name', 'LIKE', '%'.$request->cari.'%')->get();
        }else{
            $admins = Admin::orderBy('id','desc')->paginate(20);
        }

        return view('back.profiladmin.manage.index', compact('admins'));

    }

    public function register()
    {
        // $admin = Admin::where('id', Auth::user()->id)->first();

        return view('back.auth.register');
    }

    public function store(Request $request)
    {
        $rules=[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $message=[
            'name.required'=>' Nama Tidak Boleh Kosong',
            'name.string'=>' Nama Harus Berupa String',
            'name.max'=>' Nama Terlalu Panjang',

            'email.required'=>' Email Tidak Boleh Kosong',
            'email.string'=>' Email Harus Berupa String',
            'email.email'=>' Email Harus Berupa Email',
            'email.max'=>' Email Terlalu Panjang',
            'email.unique'=>' Email Sudah Digunakan',

            'password.required'=>' Password tidak boleh kosong',
            'password.string'=>' Password Harus Berupa String',
            'password.min'=>' Password Terlalu Pendek',
            'password.confirmed'=>' Password Harus Sama',
        ];
        $this->validate($request,$rules,$message);

        //simpan ke database Admin
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with('success', 'Tambah Admin Sukses!');
    }

    public function edit($id)
    {
        $admins = Admin::whereId($id)->first();

        return view('back.profiladmin.manage.edit', compact('admins'));
    }

    public function update(Request $request, $id)
    {
        $rules=[
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:admins',
            'alamat' => 'required', 'string', 'max:255',
            'nohp' => 'required', 'string', 'max:255',
            'foto'=>'required|max:5000|mimes:jpeg,png,jpg',
            'password' => 'confirmed',
        ];

        $message=[
            'name.required'=>' Nama Tidak Boleh Kosong',
            'name.string'=>' Nama Harus Berupa String',
            'name.max'=>' Nama Terlalu Panjang',

            'email.required'=>' Email Tidak Boleh Kosong',
            'email.string'=>' Email Harus Berupa String',
            'email.email'=>' Email Harus Berupa Email',
            'email.max'=>' Email Terlalu Panjang',
            'email.unique'=>' Email Sudah Digunakan',

            'alamat.required'=>' Alamat Tidak Boleh Kosong',
            'alamat.string'=>' Alamat Harus Berupa String',
            'alamat.max'=>' Alamat Terlalu Panjang',

            'nohp.required'=>' No.HP Tidak Boleh Kosong',
            'nohp.string'=>' No.HP Harus Berupa String',
            'nohp.max'=>' No.HP Terlalu Panjang',

            'foto.required'=>' Foto tidak boleh kosong',
            'foto.max'=>' Ukuran File Terlalu Besar',
            'foto.mimes'=>' File Format Harus jpeg,png,jpg',

            // 'password.required'=>' Password tidak boleh kosong',
            // 'password.string'=>' Password Harus Berupa String',
            // 'password.min'=>' Password Terlalu Pendek',
            'password.confirmed'=>' Password Harus Sama',
        ];
        $this->validate($request,$rules,$message);

        //simpan ke database Admin
        $admin = Admin::whereId($id)->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->alamat = $request->alamat;
        $admin->nohp = $request->nohp;
        if(!empty($request->password))
        {
            $admin->password = Hash::make($request->password);
        }
        if(!empty($request->foto))
        {
            if(\File::exists(public_path('img/fotoprofil/').$admin->foto))
            {
                \File::delete(public_path('img/fotoprofil/').$admin->foto);
            }
            $fileName=time().'.'.$request->foto->extension();
            $request->file('foto')->move(public_path('img/fotoprofil'), $fileName);
            $admin->foto = $fileName;
        }
        $admin->update();

        return back()->with('success', 'Perbarui data Sukses!');
    }

    public function destroy($id)
    {
        $admin = Admin::whereId($id)->first();
        if(\File::exists(public_path('img/fotoprofil/').$admin->foto)){
            \File::delete(public_path('img/fotoprofil/').$admin->foto);
        }
        Admin::whereId($id)->delete();
        return back()->with('success', 'Hapus data sukses!');
    }

}
