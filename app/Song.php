<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function comments()
    {
        return $this->hasMany("App\Comment");
    }

    public function images()
    {
        return $this->hasOne("App\Image");
    }

    /*public function likes(){
        return $this->hasMany("App\Likes");
    }*/

    public function ils_likent(){
        return $this->belongsToMany("App\Song","likes","user_id","song_id");
    }
}
