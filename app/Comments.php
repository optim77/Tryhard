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
        return $this->belongsTo('App\Photos');
    }

    public function user(){
        return $this->belongsTo(User::class,'id');
    }

    public function friends(){
        return $this->belongsTo('App\Friends','user_id2');
    }
}
