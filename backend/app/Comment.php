<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    function playlist()
    {
        return $this->hasOne(Playlist::class);
    }

    function user()
    {
        return $this->hasOne(User::class);
    }

    protected $fillable = [
        'text',
    ];
}
