<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Matriks;

class KriteriaController extends Controller
{
    function Index(){

        $kriteria = Kriteria::get()->sortBy('kode_kriteria');

        return view('PanitiaPPDB/Kriteria/Index',['kriterias'=>$kriteria]);
    }

    function SaveKriteria(Request $req){
        // dd($req->guru);

        $guru = 0;

        if($req->guru == null){
            $guru = 0;
        }elseif($req->guru != null){
            $guru = 1;
        }

        $kriteria = new Kriteria;
        $kriteria->kode_kriteria = strtoupper($req->kode);
        $kriteria->nama_kriteria = ucfirst($req->nama);
        $kriteria->atribut = $req->atribut;
        $kriteria->value = $req->value;
        $kriteria->is_guru = $guru;

        try{
            $kriteria->save();
            return back()->with('sukses', 'Data Kriteria Penilaian Berhasil Ditambahkan');
        }catch(\Exception $err){
            // SSession::flash('Failed',$err);
            // print($err);
            return back()->with('failed', 'Data Kriteria Penilaian Gagal Ditambahkan');
        }
    }

    function UpdateKriteria(Request $req, $id){
        $kriteria = Kriteria::findOrFail($id);

        $kriteria->kode_kriteria = strtoupper($req->kode);
        $kriteria->nama_kriteria = ucfirst($req->nama);
        $kriteria->atribut = $req->atribut;
        $kriteria->value = $req->value;

        try{
            $kriteria->update();
            return back()->with('sukses', 'Data Kriteria Penilaian Berhasil DiUpdate');
        }catch(\Exception $err){
            // Session::flash('Failed',$err);
            // print($err);
            return back()->with('failed', 'Data Kriteria Penilaian Gagal Ditambahkan');
        }
    }

    function DeleteKriteria($id){
        $kriteria = Kriteria::findOrFail($id);

        try{
            $kriteria->delete();
            return back()->with('sukses', 'Data Kriteria Penilaian Berhasil DiHapus');
        }catch(\Exception $err){
            // Session::flash('Failed',$err);
            // print($err);
            return back()->with('failed', 'Data Kriteria Penilaian Gagal Dihapus');
        }
    }

    function Matriks(){

        $kriteria = Kriteria::get()->sortBy('kode_kriteria');
        $matriks = Matriks::orderBy('kriteria1')
                            ->orderBy('kriteria2')
                            ->get();

        // dd($matriks);

        return view('PanitiaPPDB/Kriteria/Matriks/Matriks',[
            'kriteria'=>$kriteria,
            'matriks'=>$matriks
        ]);
    }

    function SimpanMatriksPanitia(Request $req){

        $check = Matriks::where('kriteria1','=',$req->kriteria1)
                        ->where('kriteria2','=',$req->kriteria2)
                        ->first();

        // dd($req->all());

        if($check === null){
            $kriteria1 = $req->bobot;
            $kriteria2 = 1;

            $value = round($kriteria1/$kriteria2,2);
            $value2 = round($kriteria2/$kriteria1,2);

            $matriks1 = new Matriks;
            $matriks1->kriteria1 = $req->kriteria1;
            $matriks1->kriteria2 = $req->kriteria2;
            $matriks1->panitia = $value;

            $matriks2 = new Matriks;

            if($req->kriteria1 != $req->kriteria2){
                $matriks2->kriteria1 = $req->kriteria2;
                $matriks2->kriteria2 = $req->kriteria1;
                $matriks2->panitia = $value2;
            }

            try{
                $matriks1->save();
                if($req->kriteria1 != $req->kriteria2){
                    $matriks2->save();
                }
                return back()->with('sukses', 'Data Matriks Berhasil Ditambahkan');
            }catch(\Exception $err){
                return back()->with('failed', 'Data Matriks Gagal Ditambahkan');
            }
        }else{
            return back()->with('failed','Data Matriks Sudah Ada');
        }
    }

    function SimpanMatriksGuru(Request $req){

        $check = Matriks::where('kriteria1','=',$req->kriteria1)
                        ->where('kriteria2','=',$req->kriteria2)
                        ->first();

        // dd($req->all());

        if($check === null){
            $kriteria1 = $req->bobot;
            $kriteria2 = 1;

            $value = round($kriteria1/$kriteria2,2);
            $value2 = round($kriteria2/$kriteria1,2);

            $matriks1 = new Matriks;
            $matriks1->kriteria1 = $req->kriteria1;
            $matriks1->kriteria2 = $req->kriteria2;
            $matriks1->gurubk = $value;

            $matriks2 = new Matriks;

            if($req->kriteria1 != $req->kriteria2){
                $matriks2->kriteria1 = $req->kriteria2;
                $matriks2->kriteria2 = $req->kriteria1;
                $matriks2->gurubk = $value2;
            }

            try{
                $matriks1->save();
                if($req->kriteria1 != $req->kriteria2){
                    $matriks2->save();
                }
                return back()->with('sukses', 'Data Matriks Berhasil Ditambahkan');
            }catch(\Exception $err){
                return back()->with('failed', 'Data Matriks Gagal Ditambahkan');
            }
        }else{
            return back()->with('failed','Data Matriks Sudah Ada');
        }
    }


    function UpdateMatriksPanitia(Request $req, $id){

        //Nilai matriks Orde 1
        $kriteria1 = $req->bobot;
        $kriteria2 = 1;

        // print($kriteria1);

        // dd($req->all());

        $value = $kriteria1/$kriteria2;
        $value2 = $kriteria2/$kriteria1;

        print($value." == ".$value2);

        // dd();

        $id2 = Matriks::where('kriteria1',$req->kriteria2)
                        ->where('kriteria2',$req->kriteria1)
                        ->get();

        $matriks1 = Matriks::findOrFail($id);
        $matriks1->kriteria1 = $req->kriteria1;
        $matriks1->kriteria2 = $req->kriteria2;
        $matriks1->panitia = round($value,2);

        $id2 = Matriks::where('kriteria1',$req->kriteria2)
                        ->where('kriteria2',$req->kriteria1)
                        ->select('id')
                        ->first();

        $matriks2 = Matriks::findOrFail($id2->id);
        $matriks2->kriteria1 = $req->kriteria2;
        $matriks2->kriteria2 = $req->kriteria1;
        $matriks2->panitia = round($value2,2);

        // dd($matriks2);

        try{
            $matriks1->update();
            $matriks2->update();
            // $matriks2->save();
            // UpdateMatriks2($matriks2);
            return back()->with('sukses', 'Data Matriks  Berhasil DiUpdate');
        }catch(\Exception $err){
            return back()->with('failed', 'Data Matriks Gagal DiUpdate');
        }
    }

    function UpdateMatriksGuru(Request $req, $id){

        //Nilai matriks Orde 1

        $kriteria1 = $req->bobot;
        $kriteria2 = 1;

        // print($kriteria1);

        // dd($req->all());

        $value = $kriteria1/$kriteria2;
        $value2 = $kriteria2/$kriteria1;

        // print($value." == ".$value2);

        // dd();

        $id2 = Matriks::where('kriteria1',$req->kriteria2)
                        ->where('kriteria2',$req->kriteria1)
                        ->get();

        $matriks1 = Matriks::findOrFail($id);
        $matriks1->kriteria1 = $req->kriteria1;
        $matriks1->kriteria2 = $req->kriteria2;
        $matriks1->gurubk = round($value,2);

        $id2 = Matriks::where('kriteria1',$req->kriteria2)
                        ->where('kriteria2',$req->kriteria1)
                        ->select('id')
                        ->first();

        $matriks2 = Matriks::findOrFail($id2->id);
        $matriks2->kriteria1 = $req->kriteria2;
        $matriks2->kriteria2 = $req->kriteria1;
        $matriks2->gurubk = round($value2,2);

        // dd($matriks2);

        try{
            $matriks1->update();
            $matriks2->update();
            // $matriks2->save();
            // UpdateMatriks2($matriks2);
            return back()->with('sukses', 'Data Matriks  Berhasil DiUpdate');
        }catch(\Exception $err){
            return back()->with('failed', 'Data Matriks Gagal DiUpdate');
        }
    }

    function DeleteMatriks($id){
        $id = Matriks::findOrFail($id);
        $id2 = Matriks::where('id',$id)->get();


        print_r($id2);
    }

    function MatriksAHP(){
        $kriteria = Kriteria::orderBy('kode_kriteria')->get();
        $bobot = Matriks::select('*')->get();

        $matriks = [];

        // dd($bobot->where('kriteria1', 1)->where('kriteria2', 1)->first()->nilai);
        // foreach($bobot as $b){
        //     print($b->nilai." == ");
        // }

        foreach ($kriteria as $k) {
            $matriks[$k->kode_kriteria] = [];
            foreach ($kriteria as $kr) {
                $nilai1 = $bobot->where('kriteria1', $k->kode_kriteria)->where('kriteria2', $kr->kode_kriteria)->first()->panitia;
                $nilai2 = $bobot->where('kriteria1', $k->kode_kriteria)->where('kriteria2', $kr->kode_kriteria)->first()->gurubk;
                $matriks[$k->kode_kriteria][$kr->kode_kriteria] = ($nilai1+$nilai2)/2;
            }
        }

        return $matriks;

    }

    function jumlah(){

        $matriks = $this->MatriksAHP();

        $jumlah = [];

        $kriteria = Kriteria::orderBy('kode_kriteria')->get();

        foreach($kriteria as $ki){
            $value = 0;
            foreach($kriteria as $kj){
                $value += $matriks[$kj->kode_kriteria][$ki->kode_kriteria];
            }
            $jumlah[$ki->kode_kriteria] = $value;
        }
        return $jumlah;
    }

    function normalisasi(){
        $matriks = $this->MatriksAHP();

        $jumlah = $this->jumlah();

        $kriteria = Kriteria::orderBy('kode_kriteria')->get();

        $normalisasi = [];

        foreach($kriteria as $ki){
            $normalisasi[$ki->kode_kriteria] = [];
            foreach($kriteria as $kj){
                $nilai = $matriks[$ki->kode_kriteria][$kj->kode_kriteria] / $jumlah[$kj->kode_kriteria];
                $normalisasi[$ki->kode_kriteria][$kj->kode_kriteria] = $nilai;
            }
        }

        return $normalisasi;
    }

    function prioritas(){
        $matriks = $this->normalisasi();

        $kriteria = Kriteria::orderBy('kode_kriteria')->get();

        $prioritas = [];

        foreach($kriteria as $ki){
            $value = 0;
            foreach($kriteria as $kj){
                $value += $matriks[$ki->kode_kriteria][$kj->kode_kriteria];
            }
            $prioritas[$ki->kode_kriteria] = $value;
        }

        return $prioritas;
    }

    function BobotKriteria(){
        $prioritas = $this->prioritas();

        $kriteria = Kriteria::orderBy('kode_kriteria')->get();

        $bobot = [];

        foreach($kriteria as $k=>$kr){
            $bobot[$k]['kode'] = $kr->kode_kriteria;
            $bobot[$k]['nama'] = $kr->nama_kriteria;
            $bobot[$k]['bobot'] = $prioritas[$kr->kode_kriteria]/count($prioritas);
        }
        // dd($bobot);
        return $bobot;
    }

    function MatriksView(){

        $records = Matriks::orderBy('kriteria2')
            ->orderBy('kriteria1')
            ->get();

        $kriteria = Kriteria::get();

        $jumlah = pow(count($kriteria),2);

        if($jumlah == count($records)){
            $rows = [];
            $columns = [];

            foreach ($records as $index => $record) {
                if (!isset($rows[$record->kriteria1])) {
                    $rows[$record->kriteria1] = [];
                }

                if (!in_array($record->kriteria2, $columns)) {
                    $columns[] = $record->kriteria2;
                }

                $rows[$record->kriteria1][$record->kriteria2] = ($record->panitia+$record->gurubk)/2;
            }

            $normalisasi = $this->normalisasi();
            $prioritas = $this->prioritas();
            $bobot = $this->BobotKriteria();
            $kriteria = Kriteria::orderBy('kode_kriteria')->get();

            return view('PanitiaPPDB/Kriteria/Matriks/MatriksView', [
                'rows' => $rows,
                'columns' => $columns,
                'normalisasi' => $normalisasi,
                'prioritas' => $prioritas,
                'bobotKriteria' =>$bobot,
                'kriteria' =>$kriteria
            ]);
        }else{
            return redirect()->route('MatriksIndex')->with('failed','Matriks Perbandingan belum lengkap, Silahkan Isi data Matriks Perbandingan Terlebih dahulu');
        }

    }

    function SimpanBobotKriteria(){
        $data = $this->BobotKriteria();

        // $jumlah = 0;
        // foreach($data as $dt){
        //     $jumlah += $dt['bobot'];
        // }

        // dd($jumlah);

        try{
            $kriteria = null;
            foreach($data as $d){
                $bobot = round($d['bobot'],9);
                $kriteria = Kriteria::where('kode_kriteria',$d['kode'])
                            ->update(['bobot'=>$bobot]);
            }
            if($kriteria){
                return redirect()->route('KriteriaIndex')->with('sukses', 'Bobot Kriteria Berhasil DiUpdate');
            }else{
                return redirect()->route('KriteriaIndex')->with('gagal', 'Bobot Kriteria Gagal DiUpdate');

            }
        }catch(\Exception $err){
            return back()->with('failed', 'Data Matriks Gagal DiUpdate');
        }
    }
}
