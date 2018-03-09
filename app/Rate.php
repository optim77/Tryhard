<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function user(){
        return $this->belongsToMany('App\User','users','users','id');
    }

    public function photos(){
        return $this->belongsToMany(Photos::class,'photos','id','id');
    }

    public function rate(){
        return $this->belongsTo('App\Friends','user_id2');
    }
}
