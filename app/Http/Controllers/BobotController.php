<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BobotJurusan;
use App\models\Kriteria;

class BobotController extends Controller
{
    function index(){
        $data = BobotJurusan::get();
                // ->join('kriterias','bobot_jurusans.kode_kriteria','=','kriterias.kode_kriteria');
                // ->sortBy('kode_kriteria');
                // ->orderBy('nama_bobot');

        // dd($data);

        return view('PanitiaPPDB.Kriteria.Bobot.Bobot',[
            'data' => $data
        ]);
    }
}
