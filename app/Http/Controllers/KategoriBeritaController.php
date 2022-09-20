<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriberitas = KategoriBerita::get();
        return view('pages.kategoriberita.index', compact('kategoriberitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kategoriberita.manage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->idkategoriberita;
        $namakategori = $request->namakategori;
        if(empty($id)){
            $kategoriberita = new KategoriBerita;
            $kategoriberita->namakategori = $namakategori;
            $kategoriberita->save();
            $alert = 'Data berhasil ditambah';
        } else {
            $kategoriberita = KategoriBerita::find($id);
            $kategoriberita->namakategori = $namakategori;
            $kategoriberita->save();
            $alert = 'Data berhasil diperbarui';
        }

        return redirect('/ms_kategoriberita')->with('status', $alert);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriBerita $kategoriBerita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategoriberitas = KategoriBerita::find($id);
        return view('pages.kategoriberita.manage', compact('kategoriberitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriBerita $kategoriBerita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriBerita  $kategoriBerita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategoriberita = KategoriBerita::findOrFail($id);
        $kategoriberita->delete();
        return redirect('/ms_kategoriberita')->with('status','Data berhasil dihapus');
    }
}
