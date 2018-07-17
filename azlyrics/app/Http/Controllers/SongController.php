<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\SongDemand;
use App\Song ;
use App\Artist ;
use App\Demand ;

class SongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('search','show') ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function search(Request $request)
    {
        // If ULR has pattern ?q=
        if ($request->has('q')) {
            $q       = $request->input('q') ;
            $songs   = Song::search($q)->orderBy('title');
            $artists = Artist::search($q)->orderBy('name');
        }

        // If ULR has pattern ?q= &w=
        if ($request->has('q','w')) {
            $type = $request->input('w') ;
            switch ($type) {
                case 'songs':
                $songs = $songs->paginate(10) ;
                $with  = $songs ;
                break;

                case 'artists':
                $artists = $artists->paginate(10) ;
                $with    = $artists ;
                break;
            }
            return view('songs.withresult', compact('with', 'type','q')) ;
        }

        $songs   = $songs->paginate(5) ;
        $artists = $artists->paginate(5) ;

        return view('songs.result', compact('artists', 'songs','count')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SongDemand $request)
    {
        $demand          = new Demand ;
        $demand->song    = $request->input('song') ;
        $demand->artist  = $request->input('artist') ;
        $demand->lyrics  = $request->input('lyrics') ;
        $demand->type    = $request->input('type') ;
        $demand->user_id = Auth::id() ;
        $demand->save() ;
        flash('Thank you for submitting')->warning() ;
        return redirect()->home() ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return view('songs.show', compact('song')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song')) ;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
