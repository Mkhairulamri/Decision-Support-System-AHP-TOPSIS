<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleAccess;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubNilaiController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\GuessController;
use App\Http\Controllers\BobotController;
use App\Models\Alternatif;

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

//Guess
Route::get('/',function(){
    return view('Guest/Index');
})->name('index');
Route::get('/login-view', function () {
    return view('login');
})->name('LoginIndex');
Route::post('/login',[AuthController::class,'Login'])->name('login');
Route::get('/LupaPassword',[AuthController::class,'LupaPassword'])->name('LupaPassword');

//guess
Route::get('/input-data',[AlternatifController::class,'InsertSiswa'])->name('InsertSiswa');
Route::post('/alternatif/simpanSiswa',[AlternatifController::class,'SimpanSiswa'])->name('SimpanSiswa');
Route::post('/cari-data',[GuessController::class,'CariData'])->name('CariData');
Route::post('/detail-siswa/{id}',[GuessController::class,'DetailGuess'])->name('DetailGuess');
Route::post('/edit-data/{id}',[GuessController::class,'EditGuess'])->name('EditGuess');

//Akeses
Route::middleware('RoleAccess:1'|'RoleAccess:2')->group(function(){

    //Route Guru
    Route::get('/dashboard-guru',[UserController::class,'IndexGuru'])->name('DashboardGuru');
    Route::get('/data-panitia',[UserController::class,'getUser'])->name('DataPanitia');
    Route::post('/save-user',[UserController::class,'SaveUser'])->name('SaveUser');
    Route::post('/update-user/{id}',[UserController::class,'UpdateUser'])->name('UpdateUser');
    Route::get('/user/delete/{id}',[UserController::class,'DeleteUser'])->name('DeleteUser');
    Route::get('/dashboard-Panitia',[UserController::class,'DashboardPanitia'])->name('IndexPanitia');
    Route::post('/input-siswa/{id}',[AlternatifController::class,'UpdateAlternatifGuru'])->name('UpdateAlternatifGuru');

    // kriteria Route
    Route::get('/kriteria',[KriteriaController::class,'Index'])->name('KriteriaIndex');
    Route::post('/kriteria/save',[KriteriaController::class,'SaveKriteria'])->name('SaveKriteria');
    Route::post('/kriteria/update/{id}',[KriteriaController::class,'UpdateKriteria'])->name('UpdateKriteria');
    Route::get('/kriteria/delete/{id}',[KriteriaController::class,'DeleteKriteria'])->name('DeleteKriteria');
    Route::get('/kriteria/update-bobot',[KriteriaController::class,'UpdateBobot'])->name('UpdateBobotKriterai');

    //SubNilai Kriteria
    Route::get('/sub-nilai',[SubNilaiController::class,'index'])->name('SubNilaiIndex');
    Route::post('/sub-nilai/simpan',[SubNilaiController::class,'Simpan'])->name('SimpanSubNilai');
    Route::post('/sub-nilai/update/{id}',[SubNilaiController::class,'Update'])->name('UpdateSubNilai');
    Route::get('/sub-nilai/delete/{id}',[SubNilaiController::class,'Hapus'])->name('HapusSubNilai');

    //BobotJurusan
    Route::get('/bobot-jurusan',[BobotController::class,'index'])->name('BobotIndex');

    //Matriks Route
    Route::get('/matriks',[KriteriaController::class,'Matriks'])->name('MatriksIndex');
    Route::post('/simpan-bobot-panitia',[KriteriaController::class,'SimpanMatriksPanitia'])->name('SimpanBobotPanitia');
    Route::post('/simpan-matriks-guru',[KriteriaController::class,'SimpanMatriksGuru'])->name('SimpanBobotGuru');
    Route::post('/simpan-matriks-panitia/{id}',[KriteriaController::class,'UpdateMatriksPanitia'])->name('UpdateBobotPanitia');
    Route::post('/simpan-matriks-guru/{id}',[KriteriaController::class,'UpdateMatriksGuru'])->name('UpdateBobotGuru');
    Route::get('/delete-matriks/{id}',[KriteriaController::class,'DeleteMatriks'])->name('DeleteMatriks');
    Route::get('/matriks-view',[KriteriaController::class,'MatriksView'])->name('Matriks');
    Route::get('/matriks/bobot-simpan',[KriteriaController::class,'SimpanBobotKriteria'])->name('SimpanBobotKriteria');

    //NilaiKriteria
    Route::get('/nilai',[NilaiController::class,'Index'])->name('NilaiKriteria');
    Route::post('/simpan-nilai',[NilaiController::class,'Simpan'])->name('SimpanNilai');
    Route::post('/update-nilai/{id}',[NilaiController::class,'Update'])->name('UpdateNilai');
    Route::get('/hapus-kriteria/{id}',[NilaiController::class,'Hapus'])->name('HapusNilai');

    //Alternatif
    Route::get('/alternatif',[AlternatifController::class,'Index'])->name('AlternatifIndex');
    Route::get('/alternatif/tambah',[AlternatifController::class,'Tambah'])->name('TambahAlternatif');
    Route::post('/alternatif/simpan',[AlternatifController::class,'Simpan'])->name('SimpanAlternatif');
    Route::post('/alternatif/update-admin/{id}',[AlternatifController::class,'UpdateAdmin'])->name('UpdateAdmin');
    Route::get('/alternatif/verifikasi/{id}',[AlternatifController::class,'Verifikasi'])->name('VerifikasiAlternatif');
    Route::post('/alternatif/edit/{id}',[AlternatifController::class,'Edit'])->name('EditAlternatif');
    Route::get('/alternatif/lihat/{id}',[AlternatifController::class,'LihatAlternatif'])->name('LihatAlternatif');
    Route::get('/alternatif/hapus/{id}',[AlternatifController::class,'Hapus'])->name('HapusAlternatif');
    Route::get('/alternatif/update/{id}',[AlternatifController::class,'UpdateAlternatif'])->name('UpdateAlternatif');
    Route::get('/alternatif/matriks-keputusan',[AlternatifController::class,'MatriksKeputusan'])->name('MatriksKeputusan');
    Route::get('/alternatif/matriks-normalisasi',[AlternatifController::class,'Normalisasi'])->name('alternatifSS');
    Route::get('/alternatif/solusi-ideal',[AlternatifController::class,'SolusiIdeal'])->name('SolusiIdeal');
    Route::get('/alternatif/preferensi',[AlternatifController::class,'Preferensi'])->name('Preferensi');

    Route::get('/alternatif/updateRekom',[AlternatifController::class,'SimpanRekonAlternatif'])->name('SimpanRekonAlternatif');

    Route::get('/alternatif-tambah',function(){
        return view('Mix/Tambah');
    })->name('Tambah');
});

Route::get('/cobaja',function(){
    return view('PanitiaPPDB/index');
})->name('testindex');

Route::get('/Logout',[AuthController::class,'Logout'])->name('logout');
