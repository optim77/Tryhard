<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','firstName','surname','country','phone','birthday'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function photos(){
        return $this->hasMany(Photos::class);
    }

    public function comments(){
        return $this->hasMany(Comments::class);
    }

    public function friends()
    {
        return $this->hasMany(Friends::class, 'user_id1');
    }

    public function visitors(){
        return $this->hasMany(Visitors::class,'user');
    }

    public function rate(){
        $this->hasMany(Rate::class);
    }
}
