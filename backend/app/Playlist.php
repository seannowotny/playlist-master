<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    function likes()
    {
        return $this->hasMany(Like::class);
    }

    function comments()
    {
        return $this->hasMany(Comment::class);
    }

    function clips()
    {
        return $this->hasMany(Clip::class);
    }

    function user()
    {
        return $this->hasOne(User::class);
    }

    protected $fillable = [
        'name',
    ];
}
