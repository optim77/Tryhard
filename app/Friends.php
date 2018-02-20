<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User','id');
    }

}
