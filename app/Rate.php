<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function user(){
        return $this->belongsTo('App\User','id');
    }

    public function photos(){
        return $this->belongsTo('App\Photos','id');
    }

    public function rate(){
        return $this->belongsTo('App\Friends','user_id2');
    }
}
