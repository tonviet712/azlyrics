<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use Sluggable;
    use FullTextSearch;
    
    protected $fillable = ['title','lyrics', 'album_id', 'artist_id'];

    protected $searchable = ['title','lyrics'] ;

    protected $dates = ['deleted_at'];

    public function artists() {
    	return $this->belongsToMany('App\Artist') ;
    }

    public function DeleteSong($id) {
        $song            = Song::find($id) ;
        $artistID        = [] ;
        foreach ($song->artists()->get() as $artist) {
            $artistID[]  = $artist->id ;
        }
        $song->delete($id) ;
        // Delete record on pivot table (not in artist table, artist still on table artists)
        $song->artists()->detach($artistID) ;
        return redirect()->route('home') ;
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
