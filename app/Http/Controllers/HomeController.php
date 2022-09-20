<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{ Berita,KategoriBerita,User };

class HomeController extends Controller
{
    
    public function index()
    {
        $t_berita = Berita::count();
        $t_kategoriberita = KategoriBerita::count();
        $t_useradmin = User::where('role','=','admin')->count();
        $t_userbiasa = User::where('role','=','user')->count();
        return view('pages.home.dashboard', compact('t_berita','t_kategoriberita','t_useradmin','t_userbiasa'));
    }
    
}
