<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\subnilai;
use App\Models\NilaiKriteria;

class AlternatifController extends Controller
{
    function Index(){

        $data = Alternatif::get()->orderBy('nama_siswa');

        return view('Mix/Alternatif',['data'=>$data]);
    }

    function Tambah(Request $req){

        // dd($req->jumlah);

        if($req->jumlah == null){
            return back()->with('failed','Silahkan isi Jumlah Data yang akan diinputkan');
        }else{
            $jumlah = $req->jumlah;
            $kriteria = Kriteria::get()
                        ->sortBy('value')
                        ->sortBy('kode_kriteria');
            $value = NilaiKriteria::get()->sortBy('kriteria');

            $subnilai = subnilai::get();

            return view('Mix/AlternatifTambah',[
                'jumlah'=>$jumlah,
                'kriteria'=>$kriteria,
                'subnilai'=>$subnilai,
                'pilihan'=>$value
            ]);
        }

    }

    function Simpan(Request $req){

        $jumlah = $req->jumlah;

        for($i = 1; $i <= $jumlah;$i++){
            $result = Alternatif::where('nisn',$req->data[$i]['nisn'])->first();
            // dd($result);
            if($result){
                return back()->with('failed','NISN telah Digunakan silahkan Ubah NISN');
            }else{
                $alternatif = new Alternatif;
                $alternatif = $req->data[$i]['nama'];
                $alternatif = $req->data[$i]['nisn'];
                $alternatif = $req->data[$i]['rapor'];
                $alternatif = $req->data[$i]['tpa'];
                $alternatif = $req->data[$i]['prites'];
                $alternatif = $req->data[$i]['jurusan'];
                $alternatif = $req->data[$i]['minat'];
                $alternatif = $req->data[$i]['psikologi'];
                $alternatif = $req->data[$i]['wawancara'];
                $alternatif = $req->data[$i]['rekomendasi'];
                $alternatif->save();
            }
        }
    }
}
