<?php
/**
 * Created by PhpStorm.
 * User: NASA
 * Date: 2018-02-25
 * Time: 16:45
 */

namespace App\Http\Composers;

use App\Friends;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view){
        $alerts = Friends::where('user_id1',Auth::id())->where('status','!=','accepted')->where('status','!=',Auth::id())->get()->all();
        $view->with('data',$alerts);
    }
}