<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playlist extends Model
{
    use SoftDeletes;

    function recipientPlaylists() // Playlists this playlist belongs to
    {
        return $this->belongsToMany(Playlist::class, 'playlist_playlist', 'belonger_id' /*This playlist*/, 'recipient_id' /*Recipient playlist*/);
    }

    function playlists() // The playlists which are contained in this playlist
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
