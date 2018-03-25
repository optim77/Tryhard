<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    //

    //STATUS: DONE
    public function user(){
        return $this->hasOne('App\User','id','user_id2');
    }

    //STATUS: DONE
    public function photos(){
        return $this->belongsToMany('App\Photos','user_has_photos','user','photo','user_id2')->withTimestamps();
    }
}
