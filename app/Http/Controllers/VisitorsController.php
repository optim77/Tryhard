<?php

namespace App\Http\Controllers;

use App\Visitors;
use Faker\Provider\DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisitorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addVisitor(Request $request){
        $user = $request->get('user');
        $check = Visitors::where(['user' => $user, 'visitors' => Auth::id()])->get()->all();
        if ($check == null){
            $visitor = new Visitors();
            $visitor->user = $user;
            $visitor->visitors = Auth::id();
            $visitor->save();
        }else{
            Visitors::where(['user' => $user,'visitors' => Auth::id()])->update(['created_at' => new \DateTime()]);

        }

        $response = array('code' => 100,'success' => true);
        return new JsonResponse($response);
    }

    public function getVisitorsPage(){
        $visitors = DB::table('visitors')
            ->join('users','visitors.visitors','=','users.id')
            ->select('visitors.*','users.*')
            ->where('visitors.user','=',Auth::id())->get()->all();
        return view('visitors.visitors',['visitors' => $visitors]);
    }

}
