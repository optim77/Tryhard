<?php

namespace App\Http\Controllers;

use App\Rate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{

    public function getRate(Request $request){
        $photo = $request->get('photo');
        $rate = new Rate();
        $rate->photos = $photo;
        $rate->users = Auth::id();
        $rate->save();
        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);
    }

}
