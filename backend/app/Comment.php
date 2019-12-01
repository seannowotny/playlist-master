<?php

namespace App;

use App\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    function commentable()
    {
        return $this->morphTo();
    }

    function user()
    {
        return $this->hasOne(User::class);
    }
}
