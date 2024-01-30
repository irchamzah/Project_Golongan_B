<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifikasi;

class NotifikasiController extends Controller
{
    public function show(){
        $notifikasis = Notifikasi::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get notfiikasi Berhasil',
            'notifikasis' => $notifikasis
        ]);  

    }

    public function test($id){
        $notifikasis = Notifikasi::with(['user'])->whereHas('user', function ($query) use ($id){
            $query->whereId($id);
        })->orderBy('id','desc')->get();

        return response()->json([
            'success' => 1,
            'message' => 'Get notfiikasi Berhasil',
            'notifikasis' => collect($notifikasis)
        ]);  

    }
}
