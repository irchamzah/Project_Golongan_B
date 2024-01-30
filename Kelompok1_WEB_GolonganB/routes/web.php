<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\StatusPesananController;
use App\Http\Controllers\KreasiController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\StatusController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|z`
*/

// Route::get('/linkstorage', function () {
//     Artisan::call('storage:link');
// });


Auth::routes();
Route::get('/',[WelcomeController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

/////////////////////////////////////////// INI ROUTE USER
Route::get('/layanan', [layananController::class, 'index']);
Route::get('/layanan/create/{id}', [layananController::class, 'create']);
Route::post('/layanan/store/{id}', [layananController::class, 'store']);
Route::get('/layanan/edit/{id}', [layananController::class, 'edit']);
Route::post('/layanan/update/{id}', [layananController::class, 'update']);
Route::get('/layanan/delete/{id}', [layananController::class, 'destroy']);

Route::get('/kreasi', [KreasiController::class, 'index']);
Route::get('/kreasi/detail/{id}', [KreasiController::class, 'show']);

Route::get('/notifikasi', [NotifikasiController::class, 'index']);

Route::get('/profil', [ProfilController::class, 'index']);
Route::post('/profil', [ProfilController::class, 'update']);


/////////////////////////////////////////// INI ROUTE ADMIN 
Route::prefix('admin')->group(function(){
    Route::get('/', [Admin\Auth\LoginController::class, 'loginform']);
    Route::get('/login', [Admin\Auth\LoginController::class, 'loginform'])->name('admin.login');
    Route::post('/login', [Admin\Auth\LoginController::class, 'login'])->name('admin.login');
    Route::get('/logout', [Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/home', [Admin\HomeController::class, 'index'])->name('admin.home');
    Route::get('/home/konfirmasi/{id}', [Admin\HomeController::class, 'konfirmasi'])->name('admin.home.konfirmasi');
    Route::post('/home/konfirmasi/pesanan/{id}', [Admin\HomeController::class, 'pesanan'])->name('admin.home.konfirmasi.pesanan');
    Route::post('/home/konfirmasi/tolak/{id}', [Admin\HomeController::class, 'tolak'])->name('admin.home.konfirmasi.tolak');
    Route::post('/home/konfirmasi/update/{id}', [Admin\HomeController::class, 'update'])->name('admin.home.konfirmasi.update');
    Route::get('/home/konfirmasi/destroy/{id}', [Admin\HomeController::class, 'destroy'])->name('admin.home.konfirmasi.destroy');
    Route::get('/manage/layanan', [Admin\LayananController::class, 'index'])->name('admin.manage.layanan');

    Route::get('/kreasi', [Admin\KreasiController::class, 'index'])->name('admin.kreasi');
    Route::get('/kreasi/create', [Admin\KreasiController::class, 'create'])->name('admin.kreasi.create');
    Route::post('/kreasi/store', [Admin\KreasiController::class, 'store'])->name('admin.kreasi.store');
    Route::get('/kreasi/edit/{id}', [Admin\KreasiController::class, 'edit'])->name('admin.kreasi.edit');
    Route::post('/kreasi/update/{id}', [Admin\KreasiController::class, 'update'])->name('admin.kreasi.update');
    Route::get('/kreasi/delete/{id}', [Admin\KreasiController::class, 'destroy'])->name('admin.kreasi.delete');

    Route::get('/notifikasi', [Admin\NotifikasiController::class, 'index'])->name('admin.notifikasi');
    Route::get('/notifikasi/create', [Admin\NotifikasiController::class, 'create'])->name('admin.notifikasi.create');
    Route::post('/notifikasi/store', [Admin\NotifikasiController::class, 'store'])->name('admin.notifikasi.store');
    Route::get('/notifikasi/delete/{id}', [Admin\NotifikasiController::class, 'destroy'])->name('admin.notifikasi.delete');

    Route::get('/profilAdmin', [Admin\ProfilAdminController::class, 'index'])->name('admin.profiladmin');
    Route::get('/profilAdmin/register', [Admin\ProfilAdminController::class, 'register'])->name('admin.profiladmin.register');
    Route::post('/profilAdmin/store', [Admin\ProfilAdminController::class, 'store'])->name('admin.profiladmin.store');
    Route::get('/profilAdmin/edit/{id}', [Admin\ProfilAdminController::class, 'edit'])->name('admin.profiladmin.edit');
    Route::post('/profilAdmin/update/{id}', [Admin\ProfilAdminController::class, 'update'])->name('admin.profiladmin.update');
    Route::get('/profilAdmin/delete/{id}', [Admin\ProfilAdminController::class, 'destroy'])->name('admin.profiladmin.delete');

    Route::get('/profilUser', [Admin\ProfilUserController::class, 'index'])->name('admin.profiluser');
    Route::get('/profilUser/detail/{id}', [Admin\ProfilUserController::class, 'detail'])->name('admin.profiluser.detail');
});
