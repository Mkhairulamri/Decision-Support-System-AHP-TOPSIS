<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKriteria;

class SubKriteriaController extends Controller
{
    function index(){
        $data = SubKriteria::get()->sortBy('id_kriteria');

        return view('PanitiaPPDB/Kriteria/SubKriteria',['data'=>$data]);
    }
}
