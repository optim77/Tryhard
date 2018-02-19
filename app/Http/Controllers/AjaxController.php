<?php
/**
 * Created by PhpStorm.
 * User: NASA
 * Date: 2018-02-18
 * Time: 20:13
 */

namespace App\Http\Controllers;


use App\Friends;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController
{

    /*
     * Function to use with ajax
     * It is adding the ids to friends table in database
     * Return response in JSON
     */
    public function addToFriends(Request $request){

        $user = $request->get('user');
        $id = Auth::id();
        $invite = Friends::insert(['user_id1' => $id,'user_id2' => $user,'status' => $id]);
        $response = array('code' => 100,'success' => true);

        return new JsonResponse($response);
    }

    public function deleteFromFriends(Request $request){
        $user = $request->get('user');
        $id = Auth::id();
        $delete = Friends::where('user_id1',$id)->where('user_id2',$user)->orWhere('user_id1',$user)->where('user_id2',$id)->delete();

        $response = array('code' => 100,'success' => true);

        return new JsonResponse($response);

    }

}