<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $fillable = [
        'description'
    ];

    public function comments(){
        return $this->hasMany('App\Comments','photos_id');
    }

    public function user(){
        return $this->belongsTo('App\User','id');
    }
    //OK!!!!!!
    public function rate(){
         return $this->hasMany('App\Rate','photos');
    }

    public function friends(){
        return $this->belongsTo('App\Friends','id');
    }
}
