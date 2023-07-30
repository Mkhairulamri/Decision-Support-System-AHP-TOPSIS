<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//-------Tidak Dipakai--------------
class UserController extends Controller
{
    function DashboardPanitia(){

        $kriteria = count(Kriteria::get());
        $data = count(Alternatif::get());
        $verifikasi = count(Alternatif::where('status',0)->get());
        $jurusan = count(Alternatif::where('jurusan',null)->get());

        // dd($kriteria);

        return view('PanitiaPPDB/Dashboard',
        [
            'kriteria'=>$kriteria,
            'data' =>$data,
            'verifikasi'=>$verifikasi,
            'jurusan'=>$jurusan
        ]);
    }

    function IndexGuru(){

        $kriteria = count(Kriteria::get());
        $data = count(Alternatif::get());
        $verifikasi = count(Alternatif::where('status',0)->get());
        $ranking = count(Alternatif::where('ranking',0)->get());

        // dd($kriteria);

        return view('GuruBk/Index',
        [
            'kriteria'=>$kriteria,
            'data' =>$data,
            'verifikasi'=>$verifikasi,
            'ranking'=>$ranking
        ]);
    }

    function getUser(){

        $user = User::get()->where('role',2)->sortBy('name');

        return view('GuruBK/DataPanitia',['users'=>$user]);
    }

    Function saveUser(Request $req){

        $find = User::get()->where('username',$req->username);

        if(count($find) != 0){
            print('nama Ditemukan');
            return back()->with('exist', 'Maaf Username Sudah Di gunakan, Silahkan Di ganti!');
        }else{
            $user = new User;
            $user->name = $req->nama;
            $user->username = $req->username;
            $user->email = $req->email;
            $user->password  = Hash::make('password');
            $user->jabatan = 'Panitia PPDB';
            $user->role = 2;

            try{
                $user->save();
                return back()->with('sukses', 'Pengguna Panitia PPDB Berhasil Di Tambahkan!');
            }catch(\Exception $err){
                return back()->with('failed', 'Pengguna Panitia PPDB Gagal DiTambahkan');
            }
        }
    }

    function UpdateUser(Request $req,$id){

        $user = User::findOrFail($id);

        $user->name = $req->nama;
        $user->username = $req->username;
        $user->email = $req->email;

        try{
            $user->save();
            return back()->with('sukses', 'Pengguna Panitia PPDB Berhasil DiUpdate!');
        }catch(\Exception $err){
            return back()->with('failed', 'Pengguna Panitia PPDB Gagal Diupdate');
        }
        // dd($user);
    }

    function DeleteUser($id){

        $user = User::findOrFail($id);

        try{
            $user->delete();
            return back()->with('sukses', 'Pengguna Panitia PPDB Berhasil Dihapus');
        }catch(\Exception $err){
            return back()->with('failed', 'Pengguna Panitia PPDB Gagal DiHapus');
        }
    }
}
