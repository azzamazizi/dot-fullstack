<?php

namespace App\Http\Controllers;

use App\Models\{ Berita,KategoriBerita,User };
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategoriberitas = KategoriBerita::orderBy('namakategori', 'asc')->get();

        $f_berita = Berita::leftjoin('ms_kategoriberita', function($join){
            $join->on('berita.idkategoriberita', '=', 'ms_kategoriberita.idkategoriberita');
        });

        // with filter
        if (!empty($request->search_kategoriberita)) {
            $f_berita->where('berita.idkategoriberita', '=', $request->search_kategoriberita);
        }

        $beritas = $f_berita->get([
            'berita.*','ms_kategoriberita.namakategori',
        ]);

        return view('pages.berita.index', compact('beritas','kategoriberitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriberitas = KategoriBerita::orderBy('namakategori', 'asc')->get();   
        return view('pages.berita.manage', compact('kategoriberitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->idberita;
        $judul = $request->judulberita;
        $isi = $request->isi;
        $seoberita = $request->seoberita;
        $seo = $request->seoberita;
        $ktg_berita = $request->kategoriberita;
        $user = Auth::user()->id;
        
        if(empty($id)){
            $berita = new Berita;
            $berita->judulberita = $judul;
            $berita->isi = $isi;
            $berita->tglposting = date('Y-m-d');
            $berita->jamposting = date('H:i:s');
            $berita->seoberita = Str::slug($judul, '-');
            $berita->idkategoriberita = $ktg_berita;
            $berita->user_id = $user;
            $berita->save();
            $alert = 'Data berhasil ditambah';
        } else {
            $berita = Berita::find($id);
            $berita->judulberita = $judul;
            $berita->isi = $isi;
            $berita->seoberita = Str::slug($judul, '-');
            $berita->idkategoriberita = $ktg_berita;
            $berita->save();
            $alert = 'Data berhasil diperbarui';
        }

        return redirect('/berita')->with('status', $alert);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoriberitas = KategoriBerita::orderBy('namakategori', 'asc')->get();
        $beritas = Berita::find($id);
        return view('pages.berita.manage', compact('beritas', 'kategoriberitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();
        return redirect('/berita')->with('status','Data berhasil dihapus');    
    }
}
