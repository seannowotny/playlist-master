<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clip extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    function user()
    {
        return $this->hasOne(User::class);
    }
}
