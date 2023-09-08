<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use RealRashid\SweetAlert\Facades\Alert;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film = Film::all();
        return view('film.index',compact('film'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::all();
        return view('film.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $film = new film;

        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required',
            'genre' => 'required',
        ]);

        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->poster = $request->poster;
        $film->genre_id = $request->genre;

        $simpan = $film->save();

        if($simpan){
            Alert::success('Success', 'Data berhasil ditambah');
            return redirect('/film');
        }else{
            Alert::error('Failed', 'Data gagal ditambah');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $film = film::where('id',$id)->first();

        return view('film.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $film = film::find($id);

        if (!$film) {
            return redirect()->back()->with('error','Data not found.');
        }

        $film->judul = $request->input('judul');
        $film->ringkasan = $request->input('ringkasan');
        $film->tahun = $request->input('tahun');
        $film->poster = $request->input('poster');
        $film->genre_id = $request->input('genre_id');
        $update = $film->save();

        if($update){
            Alert::success('Success', 'Data berhasil diUpdate');
            return redirect('/film');
        }else{
            Alert::error('Failed', 'Data gagal diUpdate');
        }

        return redirect()->route('film.index', $id)->with('succes','Data succesfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $film = film::find($id);

        if (!$film) {
            return redirect()->to('film')->with('error', 'data tidak ditemukan.');
        }

        $delete = $film->delete();

        if($delete){
            Alert::success('Success', 'Data berhasil dihapus');
            return redirect('/film');
        }else{
            Alert::error('Failed', 'Data gagal dihapus');
        }

        return redirect()->to('film')->with('succes', 'Data berhasil dihapus.');
    }
}