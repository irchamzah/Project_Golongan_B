<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Daurulang;

class KreasiController extends Controller
{

    public function index(){
        $kreasis = Daurulang::all();
        return response()->json([
            'success' => 1,
            'message' => 'Get Kreasi Berhasil',
            'kreasis' => $kreasis
        ]); 

    }

}
