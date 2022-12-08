<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\subnilai;

class SubNilaiController extends Controller
{
    function index(){
        $kriteria = Kriteria::get()
                    ->where('value','Angka')
                    ->sortBy('kode_kriteria');

        $subNilai = subnilai::get()
                    ->sortBy('nama_sub_nilai');
                    // ->join('kriterias.nama_kriteria','subnilais.kriteria','=','kriterias.id');

        // dd($kriteria);

        return view('PanitiaPPDB/Kriteria/SubNilai',[
            'kriteria'=>$kriteria,
            'subnilai' =>$subNilai
        ]);
    }

    function simpan(Request $req){
        // dd($req->all());

        $subnilai = new subnilai;
        $subnilai->nama_sub_nilai = $req->nama;
        $subnilai->kriteria = $req->kriteria;

        try{
            $subnilai->save();

            return back()->with('sukses','Data Sub Nilai Berhasil Ditambahkan');
        }catch(Excetion $err){
            return back()->with('error','Data Gagal DiTambahkan'.$err);
        }
    }
}
