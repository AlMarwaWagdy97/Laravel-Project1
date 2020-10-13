<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Users extends Controller
{
    public function login_get(){
        return view('ManualLogin');
    }

    public function login_post(){
        // return request()->all();
        if(auth::attempt( ['email'=> request('email'), 'password'=>request('password')]) ){
            return redirect('/');
        }
        else{
            return back('/Manual/login');
        }
    }
}
