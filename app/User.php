<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Frindable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Notifiable;
    use Frindable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','avatar','slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(profile::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class,'user_id')->orderBy('created_at');;
    }
    public function getAvatarAttribute($avatar)
    {
        return asset($avatar);
    }

}
