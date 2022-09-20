<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    
    public function loginpage()
    {
        return view('auth.login');
    }

    public function actlogin(Request $request)
    {
        $credentials = array(
            'email' => $request->email,
            'password' => $request->password,
        );

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            return redirect('/home');
        }

        return redirect()->back()->With('status', 'Gagal Login, Email atau Kata Sandi salah');

    }

    public function actlogout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }

    
}
