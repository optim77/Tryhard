<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $fillable = [
        'description'
    ];

    //STATUS: DONE
    public function comments(){
        return $this->belongsToMany('App\Comments','photos_has_comments','photo','comment','id')->withTimestamps();
    }


    //OK!!!!!!
    public function rate(){
         return $this->belongsToMany('App\Rate','photos_has_rates','photo','rate','id')->withTimestamps();
    }
}
