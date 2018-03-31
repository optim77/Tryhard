<?php

namespace App\Http\Controllers;

use App\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotosController extends Controller
{
    public function displayPhoto($photo){
        $photo = Photos::with(['comments','rate','user'])->where('slug','=',$photo)->get()->all();
        return view('profile.singlePhoto',['photo' => $photo]);
    }
}
