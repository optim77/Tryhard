<?php
/**
 * Created by PhpStorm.
 * User: NASA
 * Date: 2018-03-24
 * Time: 17:11
 */

namespace App\Http\Composers;


use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FriendsComposer
{
    public function compose(View $view){
        $friends = User::with(['friends' => function($query){$query->with(['user'])->get()->all();}])->where('id','=',Auth::id())->get()->all();
        $view->with('listOfFriends',$friends);
    }
}