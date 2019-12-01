<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playlist extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function myPlaylists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_playlist', 'belonger_id', 'recipient_id');
    }

    public function playlistsIBelongTo()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_playlist', 'recipient_id', 'belonger_id');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function clips()
    {
        return $this->hasMany(Clip::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
