<?php

namespace App\Http\Controllers;

use App\Friends;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function baseChat(){

        $friends = DB::table('friends')
            ->join('users','friends.user_id2','=','users.id')
            ->select('friends.*','users.name','users.firstName','users.surname','users.mainPhoto','users.id')->where('user_id1',Auth::id())->get()->all();
        //dump($friends);
        return view('chat.chatroom',[
            'friends' => $friends
        ]);
    }
}
