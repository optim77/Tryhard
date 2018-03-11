<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $fillable = [
        'content'
    ];

    public function photos(){
        return $this->belongsToMany('App\Photos','photos_has_comments','id','id');
    }

    public function user(){
        return $this->belongsToMany(User::class,'user_has_comments','user','comment','id')->withTimestamps();
    }

    public function friends(){
        return $this->belongsToMany('App\Friends','user_has_comments','id','id');
    }
}
