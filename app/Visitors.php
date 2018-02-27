<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }
}
