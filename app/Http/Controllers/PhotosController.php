<?php

namespace App\Http\Controllers;

use App\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhotosController extends Controller
{
    public function displayPhoto($photo){
            $photo = Photos::with(['comments','rate','user'])->where('slug','=',$photo)->get()->all();
//        $photo = DB::table('photos')
//            ->join('comments','photos.id','=','comments.photos_id')
//            ->select('photos.*','comments.*')
//            ->where('photos.slug','=',$photo)
//            ->get()->all();
        dump($photo);

        return view('profile.singlePhoto',['photo' => $photo]);
    }
}
