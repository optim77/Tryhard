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
            $nameFile = $id.'_'.$user.$name.'.txt';
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
            if ($conversation[0]->user_id1 == Auth::id()){
                //user is author
            }elseif ($conversation[0]->user_id2 == Auth::id()){

            }
            if (!$request->get('text') == null){

                $text = $request->get('text').'  /user: '.Auth::id();
                $content =  $text.Auth::id();
                fwrite($file,$text);
                fclose($file);
            }
            Conversations::where('user_id1',$user)->where('user_id2',$id)->orWhere('user_id1',$id)->where('user_id2',$user)->update(['file' => $conversation[0]->file]);
            $response = array('success' => true,'code' => 100,'conversation' => $conversation);
            return new JsonResponse($response);
        }

    }

}
