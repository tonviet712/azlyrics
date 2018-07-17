<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model
{
    use Sluggable;
    use FullTextSearch;
    
	 /**
     * The columns of the full text index
     */
    protected $searchable = ['name'];

    protected $fillable = ['name','song_id'];

    protected $dates = ['deleted_at'];

    // Many to many relationship
    public function songs() {
    	return $this->belongsToMany('App\Song') ;
    }

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'name']
            ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
