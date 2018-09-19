<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $guarded = [];
    public $with = ['user'];

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }
    public function  user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
