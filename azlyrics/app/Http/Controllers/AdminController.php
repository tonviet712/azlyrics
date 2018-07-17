<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demand ;
use App\Song ;
use App\Artist ;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('admin') ;
    }
    
    public function index()
    {

    }

    public function demand() 
    {
        $demands = Demand::oldest()->get() ;
        return view('admin.demand',compact('demands')) ;
    }

    public function create($id)
    {
        $demand = Demand::find($id) ;
        return view('admin.create', compact('demand')) ;
    }

    public function store(Request $request)
    {
        // validation
        $validatedData = $request->validate([
            'artist' => 'required',
            'title'  => 'required|unique:songs,title',
            'lyrics' => 'required|min:10' ,
        ]);
        // store artists into an array
        $Aartist            = explode('&', trim($request->input('artist'))) ; 

        $song               = new Song ;
        $song->title        = trim($request->input('title')) ;
        $song->lyrics       = $request->input('lyrics') ;
        $song->save() ;
        // check artist if existing in database
        $artistID = [] ;
        foreach ($Aartist as $name) {
            $artistID[]     = Artist::firstOrCreate(['name' => trim($name) ])->id ;
        }
        // Save M-M relationship
        $song->artists()->attach($artistID) ;

        // get id from form request to delete after saving
        $this->destroy($request->input('id')) ;

        return redirect()->route('admin.request') ;
    }

    public function edit($id)
    {
        $demand = Demand::find($id) ;
        return view('admin.edit', compact('demand')) ;
    }

    public function update(Request $request, $id)
    {
        // validation form
        $validatedData      = $request->validate([
                                                    'newartist'    => 'required',
                                                    'newtitle'     => 'required',
                                                    'lyrics'       => 'required|min:10' ,
                                                ]);

        // Update songs table
        $song                       = Song::where('title', trim($request->input('oldtitle')) )->first();
        $song->title                = $request->input('newtitle') ;
        $song->lyrics               = $request->input('lyrics') ;
        $song->save() ;

        // Check if having change of artist
        if (trim($request->input('oldartist')) != trim($request->input('newartist'))) {
            // Update new artist
            $Aartist                = explode('&', $request->input('newartist')) ;
            $newartistID            = [] ;
            foreach ($Aartist as $name) {
                $newartistID[]      = Artist::firstOrCreate(['name'  => trim($name) ])->id ;
            }
            $song->artists()->sync($newartistID) ;
        }
        
        // get id from form request to delete after saving
        $this->destroy($request->input('id')) ;

        return redirect()->route('admin.request') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if deleting song or artist
        if (request('type')) {
            Song::DeleteSong($id) ;
            flash('The song was deleted successfully')->error() ;

            return redirect()->route('home') ;
        }
        // if deleting demand
        $demand = Demand::where('id',$id)->delete();
        return redirect()->route('admin.request') ;
    }
}
