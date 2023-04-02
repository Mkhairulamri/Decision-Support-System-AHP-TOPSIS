<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class GuessController extends Controller
{
    function CariData(Request $req){
        $cari = $req->search;
        $type = intval($cari);

        // print("<br> Datanya adalah  = ". $cari);
        // print("<br> tipenya adalah  = ". gettype($type));

        // print("<br> ".$cari);

        $data = [];

        if($type == 0){
            // echo    " ini nama bukan NISN";
            $data = Alternatif::where('nama','like',$cari)->get();
        }else{
            // echo    " ini NISN";
            $data = Alternatif::where('nisn','like',$cari)->get();
        }

        // dd($data);

        return view('Guest/HasilSiswa',
        [
            'data'=>$data,
            'cari'=>$cari,

        ]);

    }
}
