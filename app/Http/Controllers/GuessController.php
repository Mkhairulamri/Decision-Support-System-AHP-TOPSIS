<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\AlternatifController;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\subnilai;
use App\Models\NilaiKriteria;
use Illuminate\Http\Request;

class GuessController extends Controller
{
    function CariData(Request $req){
        $cari = $req->search;


        $data = [];
        // print($cari);

        // dd($data);

        if(gettype($cari) == 'string'){
            $data = Alternatif::where('nama','like','%'.$cari.'%')->get();
        }else{
            $type = intval($cari);
            if(gettype($type) == "integer"){
                $data = Alternatif::where('nisn','like',$type)->get();
            }
        }
        // dd($data);

        return view('Guest/HasilSiswa',
        [
            'hasil'=>'ada',
            'message' =>null,
            'data'=>$data,
            'cari'=>$cari,

        ]);

    }

    function DetailGuess(Request $req, $id){

        // dd($req->all());

        $cek = Alternatif::where('id',$id)->where('nisn',$req->nisn)->where('tgl_lahir',$req->tgl_lahir);
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');
        $subnilai = subnilai::get()->sortBy('semester');
        $nilaikriteria = NilaiKriteria::get();


        $cari = $req->cari;
        $res = "kosong";

        if($cek->first()){
            $res = "ada";
        }

        if($res == "ada"){
            $data = AlternatifController::lihatDetail($id);
            // dd($data);
            if($data != null){
                return view('Guest/DetailSiswa',
                    [
                        'data'=>$data,
                        'kriteria' => $kriteria,
                        'subnilai' => $subnilai,
                        'pilihan'=> $nilaikriteria,
                        'result' => 0
                    ]);
            }else{
                if(gettype($cari) == 'string'){
                    $data = Alternatif::where('nama','like','%'.$cari.'%')->get();
                }else{
                    $type = intval($cari);
                    if(gettype($type) == "integer"){
                        $data = Alternatif::where('nisn','like',$type)->get();
                    }
                }
                return view('Guest/HasilSiswa',
                    [
                        'hasil' => 'failed',
                        'message' => 'Maaf, Data Tidak Ada',
                        'data'=>$data,
                        'cari'=>$cari,

                    ]);
            }
        }else{
            if(gettype($cari) == 'string'){
                $data = Alternatif::where('nama','like','%'.$cari.'%')->get();
            }else{
                $type = intval($cari);
                if(gettype($type) == "integer"){
                    $data = Alternatif::where('nisn','like',$type)->get();
                }
            }
            return view('Guest/HasilSiswa',
                [
                    'hasil' => 'failed',
                    'message' => 'Maaf NISN atau Tanggal Lahir Anda Salah',
                    'data'=>$data,
                    'cari'=>$cari,

                ]);
        }
    }

    function EditGuess(Request $req, $id){

        // dd($req->all());
        $result = Alternatif::where('id',$id)->where('nisn',$req->nisn)->where('tgl_lahir',$req->tgl_lahir)->get();
        $data = AlternatifController::lihatDetail($id);
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');
        $subnilai = subnilai::get()->sortBy('semester');
        $nilaikriteria = NilaiKriteria::get();

        if(!$result->first()){
            return back()->with('failed','Tanggal Lahir Atau NISN Salah');
        }else{
            return view('Guest/DetailSiswa',
                [
                    'data'=>$data,
                    'kriteria' => $kriteria,
                    'subnilai' => $subnilai,
                    'pilihan'=> $nilaikriteria,
                    'result' => 1
                ]);
        }
    }
}
