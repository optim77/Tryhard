<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function user(){
            return $this->belongsToMany(User::class,'user_has_rates','user','rate','id')->withTimestamps();
    }

//    public function photos(){
//        return $this->belongsToMany(Photos::class,'photos','id','id')->withTimestamps();
//    }
//
//    public function rate(){
//        return $this->belongsTo('App\Friends','user_id2');
//    }
}
