<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playlist extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    // public function recipientable()
    // {
    //     return $this->morphFromMany(Playlist::class, 'belonger_recipient', 'recipientable_id' /*This playlist*/, 'belongable_id');
    // }

    // public function belongable()
    // {
    //     return $this->morphToMany(Playlist::class, 'belonger_recipient', 'belonger_id' /*This playlist*/, 'recipient_id');
    // }

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
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function clips()
    {
        return $this->hasMany(Clip::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    protected $fillable = [
        'name', 'playlists', 'user_id'
    ];
}
