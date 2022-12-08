<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleAccess;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubNilaiController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\AlternatifController;

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
    return view('login');
})->name('index');
Route::post('/login',[AuthController::class,'Login'])->name('login');


Route::middleware('RoleAccess:1'|'RoleAccess:2')->group(function(){

    Route::get('/dashboard-guru',[UserController::class,'IndexGuru'])->name('DashboardGuru');

    Route::get('/data-panitia',[UserController::class,'getUser'])->name('DataPanitia');
    Route::post('/save-user',[UserController::class,'SaveUser'])->name('SaveUser');
    Route::post('/update-user/{id}',[UserController::class,'UpdateUser'])->name('UpdateUser');
    Route::get('/user/delete/{id}',[UserController::class,'DeleteUser'])->name('DeleteUser');


    Route::get('/dashboard-Panitia',[UserController::class,'DashboardPanitia'])->name('IndexPanitia');
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
    Route::get('/alternatif',function(){
        return view('Mix/Alternatif');
    })->name('AlternatifIndex');
    Route::post('/alternatif/tambah',[AlternatifController::class,'Tambah'])->name('TambahAlternatif');
    Route::post('/alternatif/simpan',[AlternatifController::class,'Simpan'])->name('SimpanAlternatif');

});


Route::get('/cobaja',function(){
    return view('PanitiaPPDB/index');
})->name('testindex');

Route::get('/Logout',[AuthController::class,'Logout'])->name('logout');
