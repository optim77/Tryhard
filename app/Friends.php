<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User','id');
    }

    public function photos(){
        return $this->hasMany('App\Photos','id');
    }

    public function comments(){
        return $this->hasMany('App\Comments','author');
    }

    public function rate(){
        return $this->hasMany('App\Rate','users');
    }
}
