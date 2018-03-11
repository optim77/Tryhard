<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    //

    //STATUS: DONE
    public function user(){
        return $this->belongsToMany('App\User','friends','user_id1','user_id2','id')->withTimestamps();
    }

    //STATUS: DONE
    public function photos(){
        return $this->belongsToMany('App\Photos','user_has_photos','user','photo','user_id2')->withTimestamps();
    }
}
