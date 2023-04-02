<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\subnilai;
use App\Models\NilaiKriteria;
use Illuminate\Routing\Route;

class AlternatifController extends Controller
{

    //Halaman Data Siswa Admin
    function Index(){

        $data = null;
        $kriteria = Kriteria::get()->sortBy('kode_kriteria')->where('is_guru',1);
        $subnilai = subnilai::get()->sortBy('kode_sub_nilai');
        $nilaikriteria = NilaiKriteria::get();

        $data = $this->jsonConvert();

        // dd($data);

        if(Auth()->user()->role == 1 ){
            $data = Alternatif::get()->sortBy('nama_siswa');
            return view('Mix/AlternatifAdmin',[
                'data'=>$data,
                'kriteria'=>$kriteria,
                'subnilai'=>$subnilai,
                'nilai'=>$nilaikriteria
            ]);
        }elseif(Auth()->user()->role == 2){
            $data = Alternatif::get()->sortBy('nama_siswa')->where('status',1);
            return view('Mix/AlternatifGuru',[
                'data'=>$data,
                'kriteria'=>$kriteria,
                'subnilai'=>$subnilai,
                'nilai'=>$nilaikriteria
            ]);
        }

    }

    function InsertSiswa(){
        $data = Alternatif::get()->sortBy('nama_siswa');
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');
        $subnilai = subnilai::get()->sortBy('nama_sub_nilai');
        $nilaikriteria = NilaiKriteria::get();

        // dd($subnilai);

        return view('Guest/InputSiswa',[
            'data'=>$data,
            'kriteria'=>$kriteria,
            'subnilai'=>$subnilai,
            'pilihan'=>$nilaikriteria
        ]);
    }

    function SimpanSiswa(Request $req){

        $subnilai = subnilai::get()->sortBy('nama_sub_nilai');

        $kriteria = Kriteria::get()
                    ->sortBy('value')
                    ->sortBy('kode_kriteria');

        $data = [];

        foreach($kriteria as $k){
            if($k->is_guru == 0){
                if($subnilai->where('kriteria',$k->kode_kriteria)->first()){
                    foreach($subnilai as $sn){
                        if($k->kode_kriteria == $sn->kriteria){
                            $data[$k->kode_kriteria][$sn->kode_subnilai] = $req[$k->kode_kriteria][$sn->kode_subnilai];
                        }else{
                            $data[$k->kode_kriteria] = $req[$k->kode_kriteria];
                        }
                    }
                }else{
                    $data[$k->kode_kriteria] = $req[$k->kode_kriteria];
                }
            }elseif($k->is_guru == 1){
                $data[$k->kode_kriteria] = null;
            }
        }

        $alternatif = new Alternatif;
        $alternatif->nama = $req->nama;
        $alternatif->nisn = $req->nisn;
        $alternatif->data = json_encode($data);
        $alternatif->status = 0;

        // dd($alternatif);
        if($data != null){
            try{
                $alternatif->save();
                return redirect()->route('Index')->with('sukses', 'Data Alternatif Berhasil Ditambahkan');
            }catch(\Exception $err){
                return back()->with('failed', 'Data Alternatif Gagal Ditambahkan ');
            }
        }else{
            return back()->with('failed','Data Anda Belum Lengkap silahkan Dilengkapi');
        }

    }

    function Tambah(){

        $kriteria = Kriteria::get()
                    ->sortBy('value')
                    ->sortBy('kode_kriteria');
        $value = NilaiKriteria::get()->sortBy('kriteria');

        $subnilai = subnilai::get()->sortBy('nama_sub_nilai');

        return view('Mix/Tambah',[
            'kriteria'=>$kriteria,
            'subnilai'=>$subnilai,
            'pilihan'=>$value
        ]);
    }

    function Simpan(Request $req){

        $subnilai = subnilai::get()->sortBy('nama_sub_nilai');

        $kriteria = Kriteria::get()
                    ->sortBy('value')
                    ->sortBy('kode_kriteria');

        $data = [];

        foreach($kriteria as $k){
            if($subnilai->where('kriteria',$k->kode_kriteria)->first()){
                foreach($subnilai as $sn){
                    if($k->kode_kriteria == $sn->kriteria){
                        $data[$k->kode_kriteria][$sn->kode_subnilai] = $req[$k->kode_kriteria][$sn->kode_subnilai];
                    }else{
                        $data[$k->kode_kriteria] = $req[$k->kode_kriteria];
                    }
                }
            }else{
                $data[$k->kode_kriteria] = $req[$k->kode_kriteria];
            }
        }

        // dd($data);
        $alternatif = new Alternatif;
        $alternatif->nama = $req->nama;
        $alternatif->nisn = $req->nisn;
        $alternatif->data = json_encode($data);
        // dd($alternatif->data);

        if($data != null){
            try{
                $alternatif->save();
                return redirect()->route('AlternatifIndex')->with('sukses', 'Data Alternatif Berhasil Ditambahkan');
            }catch(\Exception $err){
                return back()->with('failed', 'Data Alternatif Gagal Ditambahkan');
            }
        }else{
            return back()->with('failed','Data Anda Belum Lengkap silahkan DIlengkapi');
        }

    }

    function Edit(Request $req, $id){
    }

    function Hapus($id){
        $alternatif = Alternatif::findOrFail($id);

        try{
            $alternatif->delete();
            return back()->with('sukses', 'Data Alternatif Berhasil Dihapus');
        }catch(\Exception $err){
            return back()->with('failed', 'Data Alternatif Gagal Dihapus');
        }

    }

    function Lihat($id){
        // Data Siswa
        $data = $this->LihatDetail($id);

        // Form$data = Alternatif::get()->sortBy('nama_siswa');
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');
        $subnilai = subnilai::get()->sortBy('kode_sub_nilai');
        $nilaikriteria = NilaiKriteria::get();

        return view("Mix.LihatAlternatif",[
            'data' => $data,
            'kriteria' => $kriteria,
            'subnilai' => $subnilai,
            'pilihan'=> $nilaikriteria
        ]);
    }

    function Normalisasi(){
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');
        $data = $this->jsonConvert();
        $kriteria = Kriteria::get();
        $subnilai = subnilai::get();

        // dd($data);

        $newData = [];

        foreach($data as $key=>$d){
            foreach($kriteria as $kr){
                if($kr->value == "Pilihan"){
                    foreach($subnilai as $sn){
                        print($d['data'][$kr->id]);
                        // print('<br>');
                        // if($d['data'][$kr->id] == $sn->kriteria){
                        //     print('test'+$sn->kriteria);
                        //     $newData[$key][$kr->kode_kriteria] = $sn->bobot;
                        // }
                        // print($d['data'][$kr->kode_kriteria]);
                    }
                }
                if($kr->kode_kriteria == $d['data'][$kr->kode_kriteria]){
                    $newData[$kr->kode_kriteria] = 0;
                }
            }
        }

        dd($newData);

        return view('Mix/Normalisasi',[
            'kriteria'=>$kriteria
        ]);
    }

    function LihatDetail($id){
        $alternatif = Alternatif::get()->sortBy('nama_siswa')->where('id',$id);
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');
        $subnilai = subnilai::get()->sortBy('kode_sub_nilai');
        // dd($alternatif);
        $data=[];

        foreach($alternatif as $key=>$af){

            $data[$key]['id'] = $af->id;
            $data[$key]['nama'] = $af->nama;
            $data[$key]['nisn'] = $af->nisn;
            $data[$key]['status'] = $af->status;
            $data[$key]['data'] = json_decode($af->data,true);
            $value = json_decode($af->data,true);

            // print(gettype($value));
            foreach($kriteria as $kr){
                if ($subnilai->where('kriteria',$kr->kode_kriteria)->first()){
                    foreach($subnilai as $sn){
                        // print($sn->kode_subnilai);
                        $data[$key]['data'][$kr->kode_kriteria][$sn->kode_subnilai] = $value[$kr->kode_kriteria][$sn->kode_subnilai];
                    }
                }
            }

        }
        return $data;

    }

    function jsonConvert(){

        $alternatif = Alternatif::get()->sortBy('nama_siswa');
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');
        $subnilai = subnilai::get()->sortBy('kode_sub_nilai');

        // dd($alternatif);
        $data=[];

        foreach($alternatif as $key=>$af){

            $data[$key]['id'] = $af->id;
            $data[$key]['nama'] = $af->nama;
            $data[$key]['nisn'] = $af->nisn;
            $data[$key]['status'] = $af->status;
            $data[$key]['data'] = json_decode($af->data,true);
            $value = json_decode($af->data,true);
        }

        return $data;
    }

    function Verifikasi($id){
        $data = Alternatif::findOrFail($id);
        $data->status = 1;
        try{
            $data->update();
            return redirect()->route('AlternatifIndex')->with('sukses','Data Siswa Berhasil Di Verifikasi');
        }catch(\Exception $err){
            return redirect()->route('AlternatifIndex')->with('failed','Data Siswa Gagal Di Verifikasi '.$err);
        }
        // dd($data);
    }


}
