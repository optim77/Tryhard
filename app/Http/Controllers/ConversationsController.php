<?php

namespace App\Http\Controllers;

use App\Conversations;
use Faker\Provider\DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getConversation(Request $request){
        $user = $request->get('user');
        $id = Auth::id();
        $conversation = Conversations::where('user_id1',$user)->where('user_id2',$id)->orWhere('user_id1',$id)->where('user_id2',$user)->get()->all();

        if ($conversation == null){

            $conv = new Conversations();
            $name = uniqid(false,false);
            $nameFile = $id.'_'.$user.$name.'.html';
            $file = fopen($nameFile,'w');
            //$file->move('files/conversations');
            move_uploaded_file($file,'public/files');
            $conv->user_id1 = $id;
            $conv->user_id2 = $user;
            $conv->file = $nameFile;
            $conv->save();
            $response = array('code' => 100,'success' => true,'conversation' => $conv);
            return new JsonResponse($response);

        }else{

            $file = fopen($conversation[0]->file,"a");
            $date = new \DateTime();
            $date = $date->format('y:m:d h:i:s');
            $message = $request->get('text');
            $mess = filter_var($message,FILTER_SANITIZE_EMAIL);

            if (!$request->get('text') == null){

                if ($conversation[0]->user_id1 == Auth::id()){
                    $text = '<div class="content-message steamL"  id="'.Auth::id().'">'.$mess.'<p class="d-none">'.date("h : m : s d-m-y").'</p></div>';
                    $content =  $text.Auth::id();
                    fwrite($file,$text);
                    fclose($file);
                    $response = array('success' => true,'code' => 100,'conversation' => $conversation);
                    return new JsonResponse($response);
                }elseif ($conversation[0]->user_id2 == Auth::id()){
                    $text = '<div class="content-message steamR"  id="'.Auth::id().'">'.$mess.'<p class="d-none">'.date("h : m : s d-m-y").'</p></div>';
                    $content =  $text.Auth::id();
                    fwrite($file,$text);
                    fclose($file);
                    $response = array('success' => true,'code' => 100,'conversation' => $conversation);
                    return new JsonResponse($response);
                }


            }
            Conversations::where('user_id1',$user)->where('user_id2',$id)->orWhere('user_id1',$id)->where('user_id2',$user)->update(['file' => $conversation[0]->file]);
            $response = array('success' => true,'code' => 100,'conversation' => $conversation);
            return new JsonResponse($response);
        }

    }

    public function refresh(Request $request){

    }

}
