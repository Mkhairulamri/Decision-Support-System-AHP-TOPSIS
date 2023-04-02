<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\NilaiKriteria;

class NilaiController extends Controller
{
    function index()
    {
        $data = NilaiKriteria::join(
            "kriterias",
            "kriterias.id",
            "=",
            "nilai_kriterias.kriteria"
        )
            ->select("kriterias.nama_kriteria", "nilai_kriterias.*")
            ->get();

        $kriteria = Kriteria::orderBy("kode_kriteria")->get();

        return view("PanitiaPPDB/Kriteria/NilaiKriteria", [
            "data" => $data,
            "kriteria" => $kriteria,
        ]);
    }

    function Simpan(Request $req)
    {
        // dd($req->all());

        $exist = NilaiKriteria::where("kriteria", $req->kriteria)
            ->where("bobot", $req->bobot)
            ->where("nilai_kriteria", $req->nilai)
            ->first();

        // dd($exist);

        if ($exist) {
            return back()->with(
                "exist",
                "Maaf Data yang Anda Inputkan Telah tersedia di Database"
            );
        } else {
            if ($req->nilai1 != null && $req->nilai1 != null && $req->nilai1 >= $req->nilai2) {
                return back()->with(
                    "exist",
                    "Maaf Nilai Deskripsi yang anda Inputkan Tidak Valid"
                );
            }else if($req->nilai1 ==null && $req->nilai2 == null){
                $nilai = new NilaiKriteria();
                $nilai->kriteria = $req->kriteria;
                $nilai->nilai1 = $req->nilai1;
                $nilai->nilai2 = $req->nilai2;
                $nilai->bobot = $req->bobot;
                $nilai->nilai_kriteria = $req->nilai;

                try {
                    $nilai->save();
                    return back()->with(
                        "sukses",
                        "Data Nilai Kriteria Berhasil DiTambahkan"
                    );
                } catch (\Exception $err) {
                    return back()->with("error", $err);
                }
            }else{

            }
        }
    }

    function Update(Request $req, $id)
    {
        // dd($req->all());

        $exist = NilaiKriteria::where("kriteria", $req->kriteria)
            ->where("id", $id)
            ->where("nilai1", $req->nilai1)
            ->where("nilai2", $req->nilai2)
            ->where("bobot", $req->bobot)
            ->where("nilai_kriteria", $req->nilai)
            ->first();

        // dd($exist);

        if ($exist) {
            return back()->with(
                "exist",
                "Maaf data Yang Inputkan Sama dengan Data sebelumnya"
            );
        } else {
            if($req->nilai1 != null && $req->nilai2!= null && $req->nilai1 >= $req->nilai2){
                return back()->with(
                    "exist",
                    "Maaf data Yang Inputkan Tidak Valid"
                );
            }else{
                $nilai = NilaiKriteria::findOrFail($id);
                $nilai->kriteria = $req->kriteria;
                $nilai->nilai1 = $req->nilai1;
                $nilai->nilai2 = $req->nilai2;
                $nilai->bobot = $req->bobot;
                $nilai->nilai_kriteria = $req->nilai;

                try {
                    $nilai->save();
                    return back()->with(
                        "sukses",
                        "Data Nilai Kriteria Berhasil DiUpdate"
                    );
                } catch (\Exception $err) {
                    return back()->with("error", $err);
                }
            }
        }
    }
}
