<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Session;

class UserController extends Controller
{
    function DashboardPanitia(){

        $kriteria = count(Kriteria::get());

        // dd($kriteria);

        return view('PanitiaPPDB/Dashboard',['kriteria'=>$kriteria]);
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
            }catch(QueryException $err){
                Session::flash('Failed',$err);
                // print($err);
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
        }catch(QueryException $err){
            Session::flash('Failed',$err);
            // print($err);
            return back()->with('failed', 'Pengguna Panitia PPDB Gagal Diupdate');
        }
        // dd($user);
    }

    function DeleteUser($id){

        $user = User::findOrFail($id);

        try{
            $user->delete();
            return back()->with('sukses', 'Pengguna Panitia PPDB Berhasil Dihapus');
        }catch(QueryException $err){
            Session::flash('Failed',$err);
            // print($err);
            return back()->with('failed', 'Pengguna Panitia PPDB Gagal DiHapus');
        }
    }
}
