<?php

namespace App;

use App\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clip extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

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
