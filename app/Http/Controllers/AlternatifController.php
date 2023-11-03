<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\subnilai;
use App\Models\NilaiKriteria;
use Illuminate\Routing\Route;
use App\Models\BobotJurusan;

class AlternatifController extends Controller
{

    //Halaman Data Siswa Admin
    function Index(){

        $kriteria = Kriteria::get()->where('is_guru',1);
        $subnilai = subnilai::get();
        $nilaikriteria = NilaiKriteria::get();

        // $data = $this->jsonConvert();
        $data = Alternatif::orderBy('updated_at','DESC')->get()->all();

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
            return view('GuruBk.AlternatifGuru',[
                'data'=>$data,
                'kriteria'=>$kriteria,
                'subnilai'=>$subnilai,
                'nilai'=>$nilaikriteria
            ]);
        }
    }

    //View Input Data dari Siswa
    function InsertSiswa(){
        $data = Alternatif::get()->sortBy('nama_siswa');
        $kriteria = Kriteria::get()->sortBy('kode_kriteria')->sortBy([
            'kriteria','asc',
            'bobot','asc'
        ]);
        $subnilai = subnilai::get()->sortBy([

        ]);
        $nilaikriteria = NilaiKriteria::get()->sortBy([
            'nilai_kriteria','asc',
            'bobot','desc'
        ]);

        // dd($subnilai);

        return view('Guest/InputSiswa',[
            'data'=>$data,
            'kriteria'=>$kriteria,
            'subnilai'=>$subnilai,
            'pilihan'=>$nilaikriteria
        ]);
    }

    //Simpan Data siswa dari siswa
    function SimpanSiswa(Request $req){

        // dd($req->all());
        $subnilai = subnilai::get()->sortBy('nama_sub_nilai');

        $dataipa = [];
        $dataips = [];
        $databind = [];
        $databing = [];
        $datamtk = [];

        foreach($subnilai as $sn){
            if($sn->pelajaran == 'IPA'){
                $ipa = $sn->kode_subnilai;
                $dataipa[$sn->kode_subnilai] = $req->$ipa;
            }elseif($sn->pelajaran == 'IPS'){
                $ips = $sn->kode_subnilai;
                $dataips[$sn->kode_subnilai] = $req->$ips;
            }elseif($sn->pelajaran == 'BIND'){
                $bind = $sn->kode_subnilai;
                $databind[$sn->kode_subnilai] = $req->$bind;
            }elseif($sn->pelajaran == 'BING'){
                $bing = $sn->kode_subnilai;
                $databing[$sn->kode_subnilai] = $req->$bing;
            }elseif($sn->pelajaran == 'MTK'){
                $mtk = $sn->kode_subnilai;
                $datamtk[$sn->kode_subnilai] = $req->$mtk;
            }
        }

        // dd($dataipa);

        $alternatif = new Alternatif;
        $alternatif->nama = $req->nama;
        $alternatif->nisn = $req->nisn;
        $alternatif->tgl_lahir = $req->tgl_lahir;
        $alternatif->C01 = $req->minat;
        $alternatif->C02IPA = json_encode($dataipa);
        $alternatif->C02IPs = json_encode($dataips);
        $alternatif->C02BING = json_encode($databing);
        $alternatif->C02BIND = json_encode($databind);
        $alternatif->C02MTK = json_encode($datamtk);
        $alternatif->status = 0;

        // dd($alternatif);
        if($alternatif != null){
            try{
                $alternatif->save();
                return redirect()->route('Index')->with('sukses', 'Data Alternatif Berhasil Ditambahkan, Silahkan Tunggu Proses Rekomendasi Dari Sistem');
            }catch(\Exception $err){
                return back()->with('failed', 'Error Penyimpanan Data Alternatif'. $alternatif->nama);
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

        $dataipa = [];
        $dataips = [];
        $databind = [];
        $databing = [];
        $datamtk = [];

        foreach($subnilai as $sn){
            if($sn->pelajaran == 'IPA'){
                $ipa = $sn->kode_subnilai;
                $dataipa[$sn->kode_subnilai] = $req->$ipa;
            }elseif($sn->pelajaran == 'IPS'){
                $ips = $sn->kode_subnilai;
                $dataips[$sn->kode_subnilai] = $req->$ips;
            }elseif($sn->pelajaran == 'BIND'){
                $bind = $sn->kode_subnilai;
                $databind[$sn->kode_subnilai] = $req->$bind;
            }elseif($sn->pelajaran == 'BING'){
                $bing = $sn->kode_subnilai;
                $databing[$sn->kode_subnilai] = $req->$bing;
            }elseif($sn->pelajaran == 'MTK'){
                $mtk = $sn->kode_subnilai;
                $datamtk[$sn->kode_subnilai] = $req->$mtk;
            }
        }

        // dd($req->all());

        $alternatif = new Alternatif;
        $alternatif->nama = $req->nama;
        $alternatif->nisn = $req->nisn;
        $alternatif->tgl_lahir = $req->tgl_lahir;
        $alternatif->C01 = $req->minat;
        $alternatif->C02IPA = json_encode($dataipa);
        $alternatif->C02IPs = json_encode($dataips);
        $alternatif->C02BING = json_encode($databing);
        $alternatif->C02BIND = json_encode($databind);
        $alternatif->C02MTK = json_encode($datamtk);
        $alternatif->C03 = $req->tpa;
        $alternatif->C04 = $req->psikologi;
        $alternatif->C05 = $req->pretest;
        $alternatif->status = 0;

        // dd($alternatif);

        if($alternatif != null){
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

    function LihatAlternatif($id){
        // Data Siswa
        $data = $this->LihatDetail($id);

        $kriteria = Kriteria::get()->sortBy('kode_kriteria');
        $subnilai = subnilai::get()->sortBy('semester');
        $nilaikriteria = NilaiKriteria::get();


        if(Auth()->user()->role == 1 ){
            return view("Mix.LihatAlternatif",[
                'data' => $data,
                'kriteria' => $kriteria,
                'subnilai' => $subnilai,
                'pilihan'=> $nilaikriteria
            ]);
        }elseif(Auth()->user()->role == 2){
            if($data['C03'] == null && $data['C04'] == null && $data['C07'] == null){
                return view("GuruBk.UpdateAlternatifGuru",[
                    'data' => $data,
                    'kriteria' => $kriteria,
                    'subnilai' => $subnilai,
                    'pilihan'=> $nilaikriteria
                ]);
            }else{
                return view("GuruBk.LihatAlternatif",[
                    'data' => $data,
                    'kriteria' => $kriteria,
                    'subnilai' => $subnilai,
                    'pilihan'=> $nilaikriteria
                ]);
            }
        }
    }

    function UpdateAlternatif($id){

         // Data Siswa
         $data = $this->LihatDetail($id);

         // Form$data = Alternatif::get()->sortBy('nama_siswa');
         $kriteria = Kriteria::get()->sortBy('kode_kriteria');
         $subnilai = subnilai::get()->sortBy('semester');
         $nilaikriteria = NilaiKriteria::get();

         return view("GuruBk.UpdateAlternatifGuru",[
            'data' => $data,
            'kriteria' => $kriteria,
            'subnilai' => $subnilai,
            'pilihan'=> $nilaikriteria
        ]);
    }


    //Update Kriteria C03, C04, C05
    function UpdateAdmin(Request $req, $id){

        $data = Alternatif::findOrFail($id);

        $data->C03 = $req->tpa;
        $data->C04 = $req->psikologi;
        $data->C05 = $req->pretest;

        try{
            $data->update();
            return redirect()->route('AlternatifIndex')->with('sukses','Data Siswa Berhasil Di Update');
        }catch(\Exception $err){
            return redirect()->route('AlternatifIndex')->with('failed','Data Siswa Gagal Di Update '.$err);
        }
    }

    function LihatDetail($id){
        $alternatif = Alternatif::get()->sortBy('nama_siswa')->where('id',$id);
        // dd($alternatif);
        $data=[];

        foreach($alternatif as $key=>$af){

            $data['id'] = $af->id;
            $data['nama'] = $af->nama;
            $data['nisn'] = $af->nisn;
            $data['status'] = $af->status;
            $data['tgl_lahir'] = $af->tgl_lahir;
            $data['C01'] = $af->C01;
            $data['C02IPA'] = $af->C02IPA;
            $data['C02IPS'] = $af->C02IPS;
            $data['C02BING'] = $af->C02BING;
            $data['C02BIND'] = $af->C02BIND;
            $data['C02MTK'] = $af->C02MTK;
            $data['C03'] = $af->C03;
            $data['C04'] = $af->C04;
            $data['C05'] = $af->C05;
            $data['C06'] = $af->C06;
            $data['C07'] = $af->C07;
            $data['jurusan'] = $af->jurusan;
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

    function UpdateAlternatifGuru(Request $req, $id){
        // dd($req);

        $data = Alternatif::findOrFail($id);

        $data->C06 = $req->wawancara;
        $data->C07 = $req->rekom;

        try{
            $data->update();
            return redirect()->route('AlternatifIndex')->with('sukses','Data Siswa Telah Berhasil Di Update');
        }catch(\Exception $err){
            return redirect()->route('AlternatifIndex')->with('failed','Data Siswa Gagal Di Update');
        }
    }

    // Start Penghitungan TOPSIS
    //Matriks Keputusan View
    function MatriksKeputusan(){
        $data = $this->convertMatriks();
        $dataAlter = $this->DataAlternatif();
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');

        // dd($data);

        return view('Mix.Penghitungan.MatriksKeputusan',[
            'data'=>$data,
            'datas' => $dataAlter,
            'kriteria'=>$kriteria
        ]);
    }

    function Normalisasi(){

        $data = $this->matriksNormalisasi();
        $normalisasi = $this->cariAkar();
        $ipa = $this->matriksNormalisasiIPA($data);
        $ips = $this->matriksNormalisasiIPS($data);
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');

        // dd($ips);

        return view('Mix.Penghitungan.MatriksNormalisasi',[
            'data' =>$data,
            'cariakar' =>$normalisasi,
            'dataipa' => $ipa,
            'dataips' => $ips,
            'kriteria' =>$kriteria
        ]);
    }

    function DataAlternatif(){
        $alternatif = Alternatif::get()
                    ->where('status',1)
                    ->whereNotNull('C03')
                    ->whereNotNull('C04')
                    ->whereNotNull('C07')
                    ->sortBy('nama');

        $subnilai = NilaiKriteria::get();
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');

        // dd($alternatif);

        $data = [];

        foreach($alternatif as $key=>$dt){

            $enIPA = json_decode($dt->C02IPA);
            $jipa = ($enIPA->IPA1 + $enIPA->IPA2 + $enIPA->IPA3 + $enIPA->IPA4)/4;

            $enIPS = json_decode($dt->C02IPS);
            $jips = ($enIPS->IPS1 + $enIPS->IPS2 + $enIPS->IPS3 + $enIPS->IPS4)/4;

            $enBIND = json_decode($dt->C02BIND);
            $jbind = ($enBIND->BIND1 + $enBIND->BIND2 + $enBIND->BIND3 + $enBIND->BIND4)/4;

            $enBING = json_decode($dt->C02BING);
            $jbing = ($enBING->BING1 + $enBING->BING2 + $enBING->BING3 + $enBING->BING4)/4;

            $enMTK = json_decode($dt->C02MTK);
            $jmtk = ($enMTK->MTK1 + $enMTK->MTK2 + $enMTK->MTK3 + $enMTK->MTK4)/4;

            $data[$key]['id'] = $dt->id;
            $data[$key]['nama'] = $dt->nama;
            $data[$key]['nisn'] = $dt->nisn;
            $data[$key]['C01'] = 0;
            $data[$key]['C02IPA'] = $jipa;
            $data[$key]['C02IPS'] = $jips;
            $data[$key]['C02MTK'] = $jmtk;
            $data[$key]['C02BING'] = $jbing;
            $data[$key]['C02BIND'] = $jbind;
            $data[$key]['C03'] = $dt->C03;
            $data[$key]['C04'] = 0;
            $data[$key]['C05'] = $dt->C05;
            $data[$key]['C06'] = 0;
            $data[$key]['C07'] = 0;

            foreach($subnilai as $sn){
                if($dt->C01 == $sn->id){
                    $data[$key]['C01'] = $sn->bobot;
                }
                if($dt->C04 == $sn->id){
                    $data[$key]['C04'] = $sn->bobot;
                }
                if($dt->C06 == $sn->id){
                    $data[$key]['C06'] = $sn->bobot;
                }
                if($dt->C07 == $sn->id){
                    $data[$key]['C07'] = $sn->bobot;
                }
            }
        }
        return $data;
    }

    function convertMatriks(){
        $alternatif = Alternatif::get()
                    ->where('status',1)
                    ->whereNotNull('C03')
                    ->whereNotNull('C04')
                    ->whereNotNull('C07')
                    ->sortBy('nama');

        $subnilai = NilaiKriteria::get();

        $data = [];

        foreach($alternatif as $key=>$dt){
            $data[$key]['id'] = $dt->id;
            $data[$key]['nama'] = $dt->nama;
            $data[$key]['nisn'] = $dt->nisn;
            $data[$key]['jurusan'] = $dt->C01;
            $data[$key]['C01'] = 0;
            $data[$key]['C02IPA'] = 0;
            $data[$key]['C02IPS'] = 0;
            $data[$key]['C02MTK'] = 0;
            $data[$key]['C02BING'] = 0;
            $data[$key]['C02BIND'] = 0;
            $data[$key]['C03'] = 0;
            $data[$key]['C04'] = 0;
            $data[$key]['C05'] = 0;
            $data[$key]['C06'] = 0;
            $data[$key]['C07'] = 0;

            $enIPA = json_decode($dt->C02IPA);
            $jipa = ($enIPA->IPA1 + $enIPA->IPA2 + $enIPA->IPA3 + $enIPA->IPA4)/4;

            $enIPS = json_decode($dt->C02IPS);
            $jips = ($enIPS->IPS1 + $enIPS->IPS2 + $enIPS->IPS3 + $enIPS->IPS4)/4;

            $enBIND = json_decode($dt->C02BIND);
            $jbind = ($enBIND->BIND1 + $enBIND->BIND2 + $enBIND->BIND3 + $enBIND->BIND4)/4;

            $enBING = json_decode($dt->C02BING);
            $jbing = ($enBING->BING1 + $enBING->BING2 + $enBING->BING3 + $enBING->BING4)/4;

            $enMTK = json_decode($dt->C02MTK);
            $jmtk = ($enMTK->MTK1 + $enMTK->MTK2 + $enMTK->MTK3 + $enMTK->MTK4)/4;

            foreach($subnilai as $sn){
                if($dt->C01 == $sn->id){
                    $data[$key]['C01'] = $sn->bobot;
                }
                if($sn->kriteria == 4){
                    if($sn->nilai1 <= floor($jipa) && $sn->nilai2 >= floor($jipa) ){
                        $data[$key]['C02IPA'] = $sn->bobot;
                    }
                    if($sn->nilai1 <= floor($jips) && $sn->nilai2 >= floor($jips) ){
                        $data[$key]['C02IPS'] = $sn->bobot;
                    }
                    if($sn->nilai1 <= floor($jmtk) && $sn->nilai2 >= floor($jmtk) ){
                        $data[$key]['C02MTK'] = $sn->bobot;
                    }
                    if($sn->nilai1 <= floor($jbind) && $sn->nilai2 >= floor($jbind) ){
                        $data[$key]['C02BIND'] = $sn->bobot;
                    }
                    if($sn->nilai1 <= floor($jbing) && $sn->nilai2 >= floor($jbing) ){
                        $data[$key]['C02BING'] = $sn->bobot;
                    }
                }
                if($sn->kriteria == 2){
                    if($sn->nilai1 <= $dt->C03 && $sn->nilai2 >= $dt->C03 ){
                        $data[$key]['C03'] = $sn->bobot;
                    }
                }
                if($dt->C04 == $sn->id){
                    $data[$key]['C04'] = $sn->bobot;
                }
                if($sn->kriteria == 1 ){
                    if($sn->nilai1 <= $dt->C05 && $sn->nilai2 >= $dt->C05){
                        $data[$key]['C05'] = $sn->bobot;
                    }
                }
                if($dt->C06 == $sn->id){
                    $data[$key]['C06'] = $sn->bobot;
                }
                if($dt->C07 == $sn->id){
                    $data[$key]['C07'] = $sn->bobot;
                }
            }

        }
        return $data;
    }

    function cariAkar(){
        $data = $this->convertMatriks();

        $C01 = 0;
        $ipa = 0;
        $ips = 0;
        $bing = 0;
        $bind = 0;
        $mtk = 0;
        $C03 = 0;
        $C04 = 0;
        $C05 = 0;
        $C06 = 0;
        $C07 = 0;

        foreach($data as $dt){
            $C01 += pow($dt['C01'],2);
            $ipa += pow($dt['C02IPA'],2);
            $ips += pow($dt['C02IPS'],2);
            $mtk += pow($dt['C02MTK'],2);
            $bind += pow($dt['C02BIND'],2);
            $bing += pow($dt['C02BING'],2);
            $C03 += pow($dt['C03'],2);
            $C04 += pow($dt['C04'],2);
            $C05 += pow($dt['C05'],2);
            $C06 += pow($dt['C07'],2);
            $C07 += pow($dt['C07'],2);
        }

        $akar = [];
        $akar['C01'] = sqrt($C01);
        $akar['C02IPA'] = sqrt($ipa);
        $akar['C02IPS'] = sqrt($ips);
        $akar['C02MTK'] = sqrt($mtk);
        $akar['C02BING'] = sqrt($bing);
        $akar['C02BIND'] = sqrt($bind);
        $akar['C03'] = sqrt($C03);
        $akar['C04'] = sqrt($C04);
        $akar['C05'] = sqrt($C05);
        $akar['C06'] = sqrt($C06);
        $akar['C07'] = sqrt($C07);

        return $akar;
    }

    function matriksNormalisasi(){
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');
        $data = $this->convertMatriks();
        $akar = $this->cariAkar();
        // var_dump($akar);
        // dd($akar);

        $newData = [];

        foreach($data as $key=>$dt){
            $newData[$key]['id'] = $dt['id'];
            $newData[$key]['nama'] = $dt['nama'];
            $newData[$key]['nisn'] = $dt['nisn'];
            $newData[$key]['jurusan'] = $dt['jurusan'];
            $newData[$key]['C01'] = $dt['C01']/$akar['C01'];
            $newData[$key]['C02IPA'] = $dt['C02IPA']/$akar['C02IPA'];
            $newData[$key]['C02IPS'] = $dt['C02IPS']/$akar['C02IPS'];
            $newData[$key]['C02MTK'] = $dt['C02MTK']/$akar['C02MTK'];
            $newData[$key]['C02BING'] = $dt['C02BING']/$akar['C02BING'];
            $newData[$key]['C02BIND'] = $dt['C02BIND']/$akar['C02BIND'];
            $newData[$key]['C03'] = $dt['C03']/$akar['C03'];
            $newData[$key]['C04'] = $dt['C04']/$akar['C04'];
            $newData[$key]['C05'] = $dt['C05']/$akar['C05'];
            $newData[$key]['C06'] = $dt['C06']/$akar['C06'];
            $newData[$key]['C07'] = $dt['C07']/$akar['C07'];
        }
        // dd($newData);
        return $newData;
    }

    function matriksNormalisasiIPA($data){
        // dd($data);
        $bobot = BobotJurusan::get()->sortBy('kode_kriteria');

        $newData = [];

        foreach($data as $key=>$dt){
            $newData[$key]['id'] = $dt['id'];
            $newData[$key]['nama'] = $dt['nama'];
            $newData[$key]['nisn'] = $dt['nisn'];
            $newData[$key]['jurusan'] = $dt['jurusan'];
            foreach($bobot as $bt){
                if($bt->kode_kriteria == 'C01'){
                    $newData[$key]['C01'] = $dt['C01'] * $bt->bobot_ipa;
                }
                if($bt->kode_kriteria == 'C02BIND'){
                    $newData[$key]['C02BIND'] = $dt['C02BIND'] * $bt->bobot_ipa;
                }
                if($bt->kode_kriteria == 'C02BING'){
                    $newData[$key]['C02BING'] = $dt['C02BING'] * $bt->bobot_ipa;
                }
                if($bt->kode_kriteria == 'C02MTK'){
                    $newData[$key]['C02MTK'] = $dt['C02MTK'] *  $bt->bobot_ipa;
                }
                if($bt->kode_kriteria == 'C02IPA'){
                    $newData[$key]['C02IPA'] = $dt['C02IPA'] * $bt->bobot_ipa;
                }
                if($bt->kode_kriteria == 'C02IPS'){
                    $newData[$key]['C02IPS'] = $dt['C02IPS'] * $bt->bobot_ipa;
                }
                if($bt->kode_kriteria == 'C03'){
                    $newData[$key]['C03'] = $dt['C03'] * $bt->bobot_ipa;
                }
                if($bt->kode_kriteria == 'C04'){
                    $newData[$key]['C04'] = $dt['C04'] * $bt->bobot_ipa;
                }
                if($bt->kode_kriteria == 'C05'){
                    $newData[$key]['C05'] = $dt['C05'] * $bt->bobot_ipa;
                }
                if($bt->kode_kriteria == 'C06'){
                    $newData[$key]['C06'] = $dt['C06'] * $bt->bobot_ipa;
                }
                if($bt->kode_kriteria == 'C07'){
                    $newData[$key]['C07'] = $dt['C07'] * $bt->bobot_ipa;
                }
            }
        }
        return $newData;
    }

    function matriksNormalisasiIPS($data){
        $bobot = BobotJurusan::get()->sortBy('kode_kriteria');

        $newData = [];

        foreach($data as $key=>$dt){
            $newData[$key]['id'] = $dt['id'];
            $newData[$key]['nama'] = $dt['nama'];
            $newData[$key]['nisn'] = $dt['nisn'];
            $newData[$key]['jurusan'] = $dt['jurusan'];
            foreach($bobot as $bt){
                if($bt->kode_kriteria == 'C01'){
                    $newData[$key]['C01'] = $dt['C01'] * $bt->bobot_ips;
                }
                if($bt->kode_kriteria == 'C02BIND'){
                    $newData[$key]['C02BIND'] = $dt['C02BIND'] * $bt->bobot_ips;
                }
                if($bt->kode_kriteria == 'C02BING'){
                    $newData[$key]['C02BING'] = $dt['C02BING'] * $bt->bobot_ips;
                }
                if($bt->kode_kriteria == 'C02MTK'){
                    $newData[$key]['C02MTK'] = $dt['C02MTK'] *  $bt->bobot_ips;
                }
                if($bt->kode_kriteria == 'C02IPA'){
                    // print($bt->bobot_ips);
                    $newData[$key]['C02IPA'] = $dt['C02IPA'] * $bt->bobot_ips;
                }
                if($bt->kode_kriteria == 'C02IPS'){
                    $newData[$key]['C02IPS'] = $dt['C02IPS'] * $bt->bobot_ips;
                }
                if($bt->kode_kriteria == 'C03'){
                    $newData[$key]['C03'] = $dt['C03'] * $bt->bobot_ips;
                }
                if($bt->kode_kriteria == 'C04'){
                    $newData[$key]['C04'] = $dt['C04'] * $bt->bobot_ips;
                }
                if($bt->kode_kriteria == 'C05'){
                    $newData[$key]['C05'] = $dt['C05'] * $bt->bobot_ips;
                }
                if($bt->kode_kriteria == 'C06'){
                    $newData[$key]['C06'] = $dt['C06'] * $bt->bobot_ips;
                }
                if($bt->kode_kriteria == 'C07'){
                    $newData[$key]['C07'] = $dt['C07'] * $bt->bobot_ips;
                }
            }
        }
        // dd($newData);
        return $newData;
    }

    function SolusiIdeal(){
        $data = $this->matriksNormalisasi();
        $normipa = $this->matriksNormalisasiIPA($data);
        $normips = $this->matriksNormalisasiIPS($data);
        $minMaxIPA = $this->positifNegatif($normipa);
        $minMaxIPS = $this->positifNegatif($normips);
        $ipa = $this->solusiPositifNegatif($minMaxIPA);
        $ips = $this->solusiPositifNegatif($minMaxIPS);
        // dd($ips);

        $solusiIPA = $this->jarakSolusiIdeal($normipa, $ipa);
        $solusiIPS = $this->jarakSolusiIdeal($normipa, $ips);

        // dd($solusiIPA);

        $kriteria = Kriteria::get()->sortBy('kode_kriteria');

        return view('Mix.Penghitungan.SolusiIdeal',[
            'data' =>$data,
            'dataipa' => $minMaxIPA,
            'dataips' => $minMaxIPS,
            'kriteria' =>$kriteria,
            'jarakIPA' =>$solusiIPA,
            'jarakIPS' => $solusiIPS
        ]);
    }

    function positifNegatif($data){
        $C01 = [];
        $C02bing = [];
        $C02bind = [];
        $C02ipa = [];
        $C02ips = [];
        $C02mtk = [];
        $C03 = [];
        $C04 = [];
        $C05 = [];
        $C06 = [];
        $C07 = [];

        foreach ($data as $k => $d) {
            $C01[$k] = $d['C01'];
            $C02bing[$k] = $d['C02BIND'];
            $C02bind[$k] = $d['C02BING'];
            $C02ipa[$k] = $d['C02IPA'];
            $C02ips[$k] = $d['C02IPS'];
            $C02mtk[$k] = $d['C02MTK'];
            $C03[$k] = $d['C03'];
            $C04[$k] = $d['C04'];
            $C05[$k] = $d['C05'];
            $C06[$k] = $d['C06'];
            $C07[$k] = $d['C07'];
        }

        // dd($C02bing);

        $newData['min'] = [
            "C01" => min($C01),
            "C02BING" => min($C02bing),
            "C02BIND" => min($C02bind),
            "C02IPA" => min($C02ipa),
            "C02IPS" => min($C02ips),
            "C02MTK" => min($C02mtk),
            "C03" => min($C03),
            "C04" => min($C04),
            "C05" => min($C05),
            "C06" => min($C06),
            "C07" => min($C07)
        ];
        $newData['max'] = [
            "C01" => max($C01),
            "C02BING" => max($C02bing),
            "C02BIND" => max($C02bind),
            "C02IPA" => max($C02ipa),
            "C02IPS" => max($C02ips),
            "C02MTK" => max($C02mtk),
            "C03" => max($C03),
            "C04" => max($C04),
            "C05" => max($C05),
            "C06" => max($C06),
            "C07" => max($C07)
        ];

        return $newData;
    }

    function solusiPositifNegatif($minmax){
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');

        $result = [];

        foreach ($kriteria as $k => $kr) {
            if (strtolower($kr->atribut) == "cost") {
                //min
                $result['min']['C01'] = $minmax['min']['C01'];
                $result['min']['C02BING'] = $minmax['min']['C02BING'];
                $result['min']['C02BIND'] = $minmax['min']['C02BIND'];
                $result['min']['C02IPA'] = $minmax['min']['C02IPA'];
                $result['min']['C02IPS'] = $minmax['min']['C02IPS'];
                $result['min']['C02MTK'] = $minmax['min']['C02MTK'];
                $result['min']['C03'] = $minmax['min']['C03'];
                $result['min']['C04'] = $minmax['min']['C04'];
                $result['min']['C05'] = $minmax['min']['C05'];
                $result['min']['C06'] = $minmax['min']['C06'];
                $result['min']['C07'] = $minmax['min']['C07'];
                //max
                $result['max']['C01'] = $minmax['max']['C01'];
                $result['max']['C02BING'] = $minmax['max']['C02BING'];
                $result['max']['C02BIND'] = $minmax['max']['C02BIND'];
                $result['max']['C02IPA'] = $minmax['max']['C02IPA'];
                $result['max']['C02IPS'] = $minmax['max']['C02IPS'];
                $result['max']['C02MTK'] = $minmax['max']['C02MTK'];
                $result['max']['C03'] = $minmax['max']['C03'];
                $result['max']['C04'] = $minmax['max']['C04'];
                $result['max']['C05'] = $minmax['max']['C05'];
                $result['max']['C06'] = $minmax['max']['C06'];
                $result['max']['C07'] = $minmax['max']['C07'];

            } elseif (strtolower($kr->atribut) == "benefit") {
                 //min
                 $result['min']['C01'] = $minmax['max']['C01'];
                 $result['min']['C02BING'] = $minmax['max']['C02BING'];
                 $result['min']['C02BIND'] = $minmax['max']['C02BIND'];
                 $result['min']['C02IPA'] = $minmax['max']['C02IPA'];
                 $result['min']['C02IPS'] = $minmax['max']['C02IPS'];
                 $result['min']['C02MTK'] = $minmax['max']['C02MTK'];
                 $result['min']['C03'] = $minmax['max']['C03'];
                 $result['min']['C04'] = $minmax['max']['C04'];
                 $result['min']['C05'] = $minmax['max']['C05'];
                 $result['min']['C06'] = $minmax['max']['C06'];
                 $result['min']['C07'] = $minmax['max']['C07'];
                 //max
                 $result['max']['C01'] = $minmax['min']['C01'];
                 $result['max']['C02BING'] = $minmax['min']['C02BING'];
                 $result['max']['C02BIND'] = $minmax['min']['C02BIND'];
                 $result['max']['C02IPA'] = $minmax['min']['C02IPA'];
                 $result['max']['C02IPS'] = $minmax['min']['C02IPS'];
                 $result['max']['C02MTK'] = $minmax['min']['C02MTK'];
                 $result['max']['C03'] = $minmax['min']['C03'];
                 $result['max']['C04'] = $minmax['min']['C04'];
                 $result['max']['C05'] = $minmax['min']['C05'];
                 $result['max']['C06'] = $minmax['min']['C06'];
                 $result['max']['C07'] = $minmax['min']['C07'];
             }
        }

        return $result;
    }

    function jarakSolusiIdeal($data, $minMax){
        // dd($data);
        $kriteria = Kriteria::select('kode_kriteria')->get()->sortBy('kode_kriteria');
        $newData = [];

        foreach($data as $key=>$dt){

            $newData[$key]['id'] = $dt['id'];
            $newData[$key]['nama'] = $dt['nama'];
            $newData[$key]['nisn'] = $dt['nisn'];
            $newData[$key]['jurusan'] = $dt['jurusan'];
            $temp[$key]['plus'] = 0;
            $temp[$key]['min'] = 0;
            foreach($kriteria as $kr){

                if($kr->kode_kriteria == 'C02'){

                    $temp[$key]['min'] += ((pow($dt['C02IPA']- $minMax['min']['C02IPA'],2))+(pow($dt['C02IPS']- $minMax['min']['C02IPS'],2))+(pow($dt['C02MTK']- $minMax['min']['C02MTK'],2))+(pow($dt['C02BIND']- $minMax['min']['C02BIND'],2))+(pow($dt['C02BING']- $minMax['min']['C02BING'],2)));

                    $temp[$key]['plus'] += ((pow($dt['C02IPA']- $minMax['max']['C02IPA'],2))+(pow($dt['C02IPS']- $minMax['max']['C02IPS'],2))+(pow($dt['C02MTK']- $minMax['max']['C02MTK'],2))+(pow($dt['C02BIND']- $minMax['max']['C02BIND'],2))+(pow($dt['C02BING']- $minMax['max']['C02BING'],2)));

                }else{

                    $temp[$key]['min'] += (pow($dt[$kr->kode_kriteria] - $minMax['min'][$kr->kode_kriteria],2));
                    $temp[$key]['plus'] += (pow($dt[$kr->kode_kriteria] - $minMax['max'][$kr->kode_kriteria],2));
                }
            }
            $newData[$key]['plus'] = sqrt($temp[$key]['plus']);
            $newData[$key]['min'] = sqrt($temp[$key]['min']);
        }
        return $newData;
    }

    function Preferensi(){
        $kriteria = Kriteria::get()->sortBy('kode_kriteria');
        $jurusan = NilaiKriteria::get();
        $data = $this->matriksNormalisasi();
        $normipa = $this->matriksNormalisasiIPA($data);
        $normips = $this->matriksNormalisasiIPS($data);
        $minMaxIPA = $this->positifNegatif($normipa);
        $minMaxIPS = $this->positifNegatif($normips);
        $ipa = $this->solusiPositifNegatif($minMaxIPA);
        $ips = $this->solusiPositifNegatif($minMaxIPS);
        $solusiIPA = $this->jarakSolusiIdeal($normipa, $ipa);
        $solusiIPS = $this->jarakSolusiIdeal($normipa, $ips);
        $prefipa = $this->preferensiJurusan($solusiIPA);
        $prefips = $this->preferensiJurusan($solusiIPS);
        $prefAkhir = $this->preferensiAkhir($prefips, $prefipa);

        return view('Mix.Penghitungan.Preferensi',[
            'ipa' => $prefipa,
            'ips' => $prefips,
            'kriteria' => $kriteria,
            'jurusan'=> $jurusan,
            'preferensiAkhir' => $prefAkhir
        ]);

    }

    function preferensiJurusan($data){

        // dd($data);
        $newData =[];
        foreach($data as $key => $dt){
            $newData[$key]['id'] = $dt['id'];
            $newData[$key]['nama'] = $dt['nama'];
            $newData[$key]['nisn'] = $dt['nisn'];
            $newData[$key]['jurusan'] = $dt['jurusan'];
            $temp = ($dt['min']/($dt['plus']+$dt['min']));
            $newData[$key]['preferensi'] = $temp;
            $newData[$key]['persen'] = ceil(($temp) *100);
        }

        // dd($newData);
        return $newData;
    }

    function preferensiAkhir($ipa, $ips){

        // dd($ipa[0]['persen']);

        $newData=[];

        foreach($ipa as $key=>$dt){
            $newData[$key]['id'] = $dt['id'];
            $newData[$key]['nama'] = $dt['nama'];
            $newData[$key]['nisn'] = $dt['nisn'];
            $newData[$key]['jurusan'] = $dt['jurusan'];
            $newData[$key]['prefipa'] = $dt['preferensi'];
            $newData[$key]['prefips'] = $ips[$key]['preferensi'];
            $jurusan = null;
            if($dt['preferensi']>= $ips[$key]['preferensi']){
                $jurusan = 'IPA';
            }else{
                $jurusan = 'IPS';
            }
            $newData[$key]['rekom']  = $jurusan;
        }

        return $newData;
    }

    function SimpanRekonAlternatif(){
        $data = $this->matriksNormalisasi();
        $normipa = $this->matriksNormalisasiIPA($data);
        $normips = $this->matriksNormalisasiIPS($data);
        $minMaxIPA = $this->positifNegatif($normipa);
        $minMaxIPS = $this->positifNegatif($normips);
        $ipa = $this->solusiPositifNegatif($minMaxIPA);
        $ips = $this->solusiPositifNegatif($minMaxIPS);
        $solusiIPA = $this->jarakSolusiIdeal($normipa, $ipa);
        $solusiIPS = $this->jarakSolusiIdeal($normipa, $ips);
        $prefipa = $this->preferensiJurusan($solusiIPA);
        $prefips = $this->preferensiJurusan($solusiIPS);
        $prefAkhir = $this->preferensiAkhir($prefips, $prefipa);

        // dd($prefAkhir);
        $count = 0;

        foreach($prefAkhir as $p){
            $rekom = Alternatif::findOrFail($p['id']);

            $rekom->jurusan = $p['rekom'];
            $rekom->update();
            $count ++;
        }

        if($count == count($prefAkhir)){
            return back()->with('sukses', 'Rekomendasi Siswa berhasil ditambahkan');
        }else if($count < count($prefAkhir)){
            return back()->with('undone', 'Data Alternatif gagal di update Semua');
        }else{
            return back()->with('failed', 'Error update Data Rekomendasi');
        }
    }
}
