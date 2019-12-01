<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    function playlist()
    {
        return $this->hasOne(Playlist::class);
    }

    function user()
    {
        return $this->hasOne(User::class);
    }
}
