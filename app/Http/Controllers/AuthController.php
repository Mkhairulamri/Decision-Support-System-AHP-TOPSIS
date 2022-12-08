<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function Login(Request $req){
        if(Auth::attempt($req->only('username','password'))){

            $req->session()->regenerate();

            if(Auth()->user()->role == 2 ){
                // dd(Auth());
                return redirect()->route('DashboardGuru');
            }else if(Auth()->user()->role == 1){
                return redirect()->route('IndexPanitia');
            }else{
                return back()->with('gagal','Email atau Password anda Salah');
            }
        }else{
            return back()->with('gagal','Email atau Password anda Salah');
        }
    }

    function Logout(){
        Auth::logout();

        return redirect()->route('index');
    }
}
