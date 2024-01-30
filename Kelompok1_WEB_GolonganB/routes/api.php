<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('login', [App\Http\Controllers\Api\UserController::class, 'login']);
Route::post('register', [App\Http\Controllers\Api\UserController::class, 'register']);
Route::post('profil/edit/{id}', [App\Http\Controllers\Api\UserController::class, 'edit']);

Route::get('kreasi', [App\Http\Controllers\Api\KreasiController::class, 'index']);

Route::get('notifikasi', [App\Http\Controllers\Api\NotifikasiController::class, 'show']);
Route::get('notifikasi/user/{id}', [App\Http\Controllers\Api\NotifikasiController::class, 'test']);

Route::post('layanan/pesan/{id}', [App\Http\Controllers\Api\LayananController::class, 'pesan']);
Route::get('layanan/riwayat/menunggu/{id}', [App\Http\Controllers\Api\LayananController::class, 'ambildata']);
Route::post('layanan/riwayat/menunggu/update/{id}', [App\Http\Controllers\Api\LayananController::class, 'update']);
Route::post('layanan/riwayat/menunggu/hapus/{id}', [App\Http\Controllers\Api\LayananController::class, 'hapus']);
Route::post('layanan/riwayat/selesai/hapus/{id}', [App\Http\Controllers\Api\LayananController::class, 'selesaihapus']);
Route::get('layanan/riwayat/dikonfirmasi/{id}', [App\Http\Controllers\Api\LayananController::class, 'ambildatadikonfirmasi']);
Route::get('layanan/riwayat/selesai/{id}', [App\Http\Controllers\Api\LayananController::class, 'ambildataselesai']);
Route::get('layanan/riwayat/ditolak/{id}', [App\Http\Controllers\Api\LayananController::class, 'ambildataditolak']);