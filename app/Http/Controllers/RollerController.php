<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RollerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * Return view to roller
     */
    public function roller(){
        return view('roller.roller');
    }
    /*
     * Function to ajax
     * Return random user
     */
    public function getRoll(Request $request){
        if ($request->get('gender') == 'all'){

            $user = \App\User::all()->random(1);

        }elseif ($request->get('gender') == 'men'){

            $user = \App\User::all()->random(1);

        }elseif ($request->get('gender') == 'women'){

            $user = \App\User::all()->random(1);

        }else{

            $user = \App\User::all()->random(1);
        }

        $response = array('code' => 100,'success' => true,'user' => $user);
        return new JsonResponse($response);
    }
}
