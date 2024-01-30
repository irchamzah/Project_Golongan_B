<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function login(Request $request){
        $user    = User::where('email', $request->email)->first();
        // dd($request->all());
        if($user){

            if(password_verify($request->password, $user->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat Datang '.$user->name.'!',
                    'user' => $user,
                ]);
            }

            return $this->error('Password Salah');

        }

        return $this->error('Email Tidak Terdaftar');

    }

    public function register(Request $request)
    {
        //name,emial,password
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'nohp' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required|min:6'
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $user = User::create(array_merge($request->all(), [
            'password' => bcrypt($request->password)
        ]));

        if($user){
            return response()->json([
                'success' => 1,
                'message' => 'Register Berhasil',
                'user' => $user
            ]);
        }

        return $this->error('Registrasi Gagal');


    }

    public function edit(Request $request, $id)
    {
        //validasi input
        $validasi = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email',
            'alamat'=>'required',
            'nohp'=>'required|numeric',
        ]);

        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return response()->json(['success' => 0, 'message' => $val[0]]);
        }

        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->nohp = $request->nohp;
        if(!empty($request->password))
        {
            $user->password = bcrypt($request->password);
        }
        if(!empty($request->path->getClientOriginalName()))
        {
            if(\File::exists(public_path('img/fotoprofil/').$user->foto)){
                \File::delete(public_path('img/fotoprofil/').$user->foto);
            }
            $ext = str_replace('', '', $request->path->getClientOriginalName());
            $filename = date('YmdHs').'.'. $ext;
            $request->path->move(public_path('img/fotoprofil'), $filename);
            $user->foto = $filename;
        }
        $user->update();

        //kirim respon ke android
        if($user){
            return response()->json([
                'success' => 1,
                'message' => 'Berhasil Memperbarui Profil!',
            ]);
        }
        return $this->error('Gagal Memesan');
    }


    public function error($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
    
}
