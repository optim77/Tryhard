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
        return $this->belongsTo(User::class);
    }

    public function rate(){
        $this->hasMany('App\Rate','id');
    }
}
