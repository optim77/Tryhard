<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $fillable = [
        'description'
    ];

    public function comments(){
        return $this->hasMany('App\Comments');
    }
}
