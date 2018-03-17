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

    //STATUS: DONE
    public function photos(){
        return $this->belongsToMany(Photos::class,'user_has_photos','user','photo','id')->withTimestamps();
    }


    public function comments(){
        return $this->belongsToMany('user_has_comments','user','comment')->withTimestamps();
    }

    public function rates(){
        return $this->belongsToMany('user_has_rates','rates','rate')->withTimestamps();
    }

    public function friends()
    {
        return $this->hasMany(Friends::class, 'user_id1','id');
    }

    public function visitors(){
        return $this->hasMany(Visitors::class,'user');
    }

    public function rate(){
       return $this->hasMany('App\Rate','id');
    }
}
