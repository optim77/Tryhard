<?php

namespace App\Http\Controllers;

use App\PhotosHasRate;
use App\Rate;
use App\UserHasRate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{

    public function getRate(Request $request){

        $photo = $request->get('photo');

        $rate = DB::table('rates')->insertGetId(['rate' => 1,'created_at' => new \DateTime()],'id');
        $uhr = new UserHasRate();
        $uhr->user = Auth::id();
        $uhr->rate = $rate;
        $uhr->save();

        $photo = new PhotosHasRate();
        $photo->photo = $photo;
        $photo->rate = $rate;
        $photo->save();

        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);
    }

    public function unlike(Request $request){
        $photo = $request->get('photo');
        $rate = Rate::where('photos',$photo)->where('users',Auth::id())->delete();
        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);
    }

}
