<?php
/**
 * Created by PhpStorm.
 * User: NASA
 * Date: 2018-02-18
 * Time: 20:13
 */

namespace App\Http\Controllers;


use App\Comments;
use App\Friends;
use App\PhotosHasComments;
use App\UserHasComments;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $invite = Friends::insert(['user_id1' => $user,'user_id2' => $id,'status' => $id]);
        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);
    }

    /*
     * Function to use with ajax
     * It is set the accepted status on user in database
     * Return response in JSON
     */
    public function acceptInvite(Request $request){

        $user = $request->get('user');
        $id = Auth::id();
        $acp = Friends::where(['user_id1' => $id,'user_id2' => $user])->update(['status' => 'accepted']);
        $acp2 = Friends::where(['user_id1' => $user,'user_id2' => $id])->update(['status' => 'accepted']);
        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);
    }

    /*
     * Function to use with ajax
     * It is cancel invite to friends on user in database
     * Return response in JSON
     */
    public function cancelInvite(Request $request){
        $user = $request->get('user');
        $id = Auth::id();
        $delete = Friends::where('user_id1',$id)->where('user_id2',$user)->delete();
        $delete = Friends::where('user_id1',$user)->where('user_id2',$id)->delete();
        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);
    }

    /*
     * Function to use with ajax
     * It is deleting users ids form database
     * Return response in JSON
     */
    public function deleteFromFriends(Request $request){
        $user = $request->get('user');
        $id = Auth::id();
        $delete = Friends::where('user_id1',$id)->where('user_id2',$user)->delete();
        $delete = Friends::where('user_id1',$user)->where('user_id2',$id)->delete();
        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);

    }

    /*
     * Function to use with ajax
     * It is set blocked on user in database
     * Return response in JSON
     */
    public function blockUser(Request $request){
        $user = $request->get('user');
        $id = Auth::id();
        $block = Friends::where('user_id1',$id)->where('user_id2',$user)->delete()->update(['status' => 'blocked - '.$id]);
        $block = Friends::where('user_id1',$user)->where('user_id2',$id)->delete()->update(['status' => 'blocked - '.$id]);
        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);
    }

    /*
     * Function to use with ajax
     * It is set unlock status on user in database
     * Return response in JSON
     */
    public function unlockFriends(Request $request){
        $user = $request->get('user');
        $id = Auth::id();
        $unlock = Friends::where('user_id1',$id)->where('user_id2',$user)->delete()->update(['status' => 'accepted']);
        $unlock = Friends::where('user_id1',$id)->where('user_id2',$user)->delete()->update(['status' => 'accepted']);
        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);
    }

    /*
     * Function to use with ajax
     * It is adding new comment to photo with such id
     * Return response in JSON
     */
    public function commentAction(Request $request){
        $target = $request->get('target');
        $content = $request->get('content');

        $comment = new Comments();
        $comment = DB::table('comments')->insertGetId(['content' => $content,'created_at' => new \DateTime()],'id');

        $photo = new PhotosHasComments();
        $photo->photo = $target;
        $photo->comment = $comment;
        $photo->save();


        $user = new UserHasComments();
        $user->user = Auth::id();
        $user->created_at = new \DateTime();
        $user->comment = $comment;
        $user->save();

        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);
    }

    public function setProfileImage(Request $request){
        $photo = $request->get('photo');
        $photo = explode('/',$photo);
        $result = end($photo);
        $switch = \App\User::where('id',Auth::id())->update(['mainPhoto' => $result]);
        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);
    }

}