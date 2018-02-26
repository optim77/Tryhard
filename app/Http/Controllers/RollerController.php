<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RollerController extends Controller
{
    public function roller(){
        $ids = DB::table('users')->get(['id'])->all();
        return view('roller.roller',['users' => $ids]);
    }
}
