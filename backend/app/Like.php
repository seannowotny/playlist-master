<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    function likeable()
    {
        return $this->morphTo();
    }

    function playlist()
    {
        return $this->hasOne(Playlist::class);
    }

    function user()
    {
        return $this->hasOne(User::class);
    }
}
