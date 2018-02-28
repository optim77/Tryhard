<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function user(){
        $this->belongsTo(User::class);
    }

    public function photos(){
        $this->belongsTo(Photos::class);
    }
}
