<?php
/**
 * Created by PhpStorm.
 * User: NASA
 * Date: 2018-03-24
 * Time: 17:11
 */

namespace App\Http\Composers;


use App\Friends;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FriendsComposer
{
    public function compose(View $view){
        $friends = DB::table('friends')
            ->join('users','friends.user_id2','=','users.id')
            ->select('friends.*','users.*')->where('user_id1',Auth::id())->get()->all();

        $view->with('listOfFriends',$friends);
    }
}