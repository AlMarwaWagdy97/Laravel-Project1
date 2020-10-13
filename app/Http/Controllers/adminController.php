<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function login_get(){
        return view('AdminLogin');
    }

    public function login_post(){
        dd(Auth::attempt( ['email'=> request('email'), 'password'=>request('password')]));
    //     // return request()->all();
    //     if(Auth::attempt( ['email'=> request('email'), 'password'=>request('password')]) ){
    //         return redirect('/Adminpath');
    //     }
    //     else{
    //         return back('AdminLogin');
    //     }
    }
}
