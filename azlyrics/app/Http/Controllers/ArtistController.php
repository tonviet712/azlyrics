<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist ;
use App\Song ;

class ArtistController extends Controller
{
    public function show(Artist $artist ) 
    {
    	return view('artist.show', compact('artist')) ;
    }

    public function edit($id){
    	$artist = Artist::find($id) ;
    	return view('artist.edit',compact('artist')) ;
    }

    public function update (Request $request, $id)
    {
    	$validatedData  = $request->validate([
            'artist' => 'required',
        ]);

        $artist 		= Artist::find($id) ;
        $artist->name 	= $request->input('artist') ;
        $artist->save() ;

        return redirect()->route('home') ;
    }

    public function destroy ($id)
    {
    	$artist 		= Artist::find($id) ;
    	$songID			= [] ;
    	foreach ($artist->songs()->get() as $song) {
    		$songID[] 	= $song->id ;
    		Song::DeleteSong($song->id) ;
    	}
    	$artist->delete($id) ;
    	flash('The artist was deleted successfully')->error() ;
    	return redirect()->route('home') ;
    }
}
