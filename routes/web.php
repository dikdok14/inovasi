<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BayarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('login');


Route::post('/login',[AuthController::class,'postlogin']);
Route::post('/logout',[AuthController::class,'logout']);
Route::middleware(['auth',])->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index']);

    Route::get('/user',[UserController::class,'index']);
    Route::post('/user/simpan',[UserController::class,'simpan']);
    Route::get('/user/{id}/edit',[UserController::class,'formedit']);
    Route::post('/user/{id}/rubah',[UserController::class,'rubah']);
    Route::get('/user/{id}/hapus',[UserController::class,'hapus']);
    
    Route::get('/pegawai',[PegawaiController::class,'index']);
    Route::post('/pegawai/simpan',[PegawaiController::class,'simpan']);
    Route::get('/pegawai/{id}/edit',[PegawaiController::class,'formedit']);
    Route::post('/pegawai/{id}/rubah',[PegawaiController::class,'rubah']);
    Route::get('/pegawai/{id}/hapus',[PegawaiController::class,'hapus']);
    
    Route::get('/pasien',[PasienController::class,'index']);
    Route::post('/pasien/simpan',[PasienController::class,'simpan']);
    Route::get('/pasien/{id}/edit',[PasienController::class,'formedit']);
    Route::post('/pasien/{id}/rubah',[PasienController::class,'rubah']);
    Route::get('/pasien/{id}/hapus',[PasienController::class,'hapus']);
    
    Route::get('/obat',[ObatController::class,'index']);
    Route::post('/obat/simpan',[ObatController::class,'simpan']);
    Route::get('/obat/{id}/edit',[ObatController::class,'formedit']);
    Route::post('/obat/{id}/rubah',[ObatController::class,'rubah']);
    Route::get('/obat/{id}/hapus',[ObatController::class,'hapus']);
    
    Route::get('/bobat',[ObatController::class,'index2']);
    Route::get('/botambah',[ObatController::class,'tambah']);
    Route::post('/obat/beli',[ObatController::class,'beli']);
    Route::post('/obat/pasien',[ObatController::class,'pasien']);
    Route::post('/obat/nota',[ObatController::class,'nota']);
    Route::get('/bobat/{id}/detail',[ObatController::class,'detail']);
    Route::get('/bobat/{id}/cetak',[ObatController::class,'cetak']);
    Route::get('/bobat/{id}/hapus',[ObatController::class,'hapus2']);
    
    Route::get('/tindakan',[TindakanController::class,'index']);
    Route::post('/tindakan/simpan',[TindakanController::class,'simpan']);
    Route::get('/tindakan/{id}/edit',[TindakanController::class,'formedit']);
    Route::post('/tindakan/{id}/rubah',[TindakanController::class,'rubah']);
    Route::get('/tindakan/{id}/hapus',[TindakanController::class,'hapus']);
    
    Route::get('/btindakan',[TindakanController::class,'index2']);
    Route::get('/bttambah',[TindakanController::class,'tambah']);
    Route::post('/tindakan/beli',[TindakanController::class,'beli']);
    Route::post('/tindakan/pasien',[TindakanController::class,'pasien']);
    Route::post('/tindakan/nota',[TindakanController::class,'nota']);
    Route::get('/btindakan/{id}/detail',[TindakanController::class,'detail']);
    Route::get('/btindakan/{id}/cetak',[TindakanController::class,'cetak']);

    Route::get('/pembayaran',[BayarController::class,'index']);
    Route::get('/bayartambah',[BayarController::class,'tambah']);
    Route::post('/bayar/obat',[BayarController::class,'obat']);
    Route::post('/bayar/tindakan',[BayarController::class,'tindakan']);
    Route::post('/bayar/nota',[BayarController::class,'bayar']);
    
    Route::get('/laporan', function () {
        return view('laporan');
    });
});


