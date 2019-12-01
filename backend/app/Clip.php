<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clip extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    function playlists()
    {
        return $this->hasMany(Playlist::class);
    }

    function user()
    {
        return $this->hasOne(User::class);
    }

    protected $fillable = [
        'url',
    ];
}
