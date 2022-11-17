<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function postlogin(Request $r)
    {
        if(Auth::attempt($r->only('email','password')))
        {
            return redirect('/dashboard');
        }else{
            return redirect('/');
        }
    }

    public function logout(Request $r)
    {
        Auth::logout();
 
        $r->session()->invalidate();
    
        $r->session()->regenerateToken();
    
        return redirect('/');
    }
}
