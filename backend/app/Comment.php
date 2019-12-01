<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    function commentable()
    {
        return $this->morphTo();
    }

    function user()
    {
        return $this->hasOne(User::class);
    }
}
