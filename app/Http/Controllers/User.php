<?php

namespace App\Http\Controllers;

use App\Friends;
use App\Photos;
use App\UserHasPhotos;
use App\Visitors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Friends::with(['user'=>function($query){$query->pluck('name');},'photos' => function($query) {
            $query->with(['comments' => function($query){
                $query->with(['user'])->get()->all();
            },'rate'])->get()->all();
        }
        ])->where('user_id1','=',Auth::id())->get()->all();
        $visitors = Visitors::where('user','=',Auth::id())->get()->all();
        return view('profile.base',[
            'user' => Auth::user(),
            'photos' => isset($photos) ? $photos : null ,
            'visitors' => $visitors
        ]);
    }

    /*
     * Display self profile
     */
    public function profile(){
        $user = \App\User::with(['photos' => function($query){
            $query->with(['comments' => function($query){
                $query->with(['user'])->get()->all();
            }])->get()->all();
        },'rate'])->where('id','=',Auth::id())->get()->all();
        return view('user.main',['user' => Auth::user(),'photos' => $user[0]]
        );

    }

    /*
     * Function to search friends
     * Return array with users
     */
    public function searchUsers(Request $request){
        $search = $request->get('search');
        if ($search != null){
            $result = \App\User::where('firstName','like','%'.$search.'%')->orWhere('surname','like','%'.$search.'%')->get()->all();
            return view('search.user',['users' => $result]);
        }
        $friends = \App\User::with(['friends' => function($query){
            $query->with(['user' => function($query){
                $query->with(['friends' => function($query){
                    $query->with(['user'])->get()->all();
                }])->get()->all();
            }])->get()->all();
        }])->where('id','=',Auth::id())->get()->all();
        $user = Auth::user();
        $country = $user->country;
        $age = $user->birthday;
        $f2 = DB::table('users')->where('country','=',$country)->orWhere('country','like','%',$country,'%')->orWhere('birthday','=',$age)->skip(1)->limit(2)->get()->all();
        return view('search.user',['friends' => $friends,'f2' => $f2]);
    }

    /*
     * Function to displaying upload view
     * Return upload view
     */
    public function upload(Request $request){

        if ($request->file('file')){
            if ($request->file('file')->getClientSize() < 500000){
                $photo = new Photos();
                $pivot = new UserHasPhotos();
                $pivot->user = Auth::id();
                $pivot->photo;
                $photo->description = $request->get('description');
                $name = uniqid(null,true);
                $guessExtension = $request->file('file')->guessExtension();
                $photo->slug = $name.'.'.$guessExtension;
                $photo->save();
                $id = Photos::where('slug','=',$name.'.'.$guessExtension)->get()->all();
                $pivot->photo = $id[0]->id;
                $pivot->save();
                $request->file('file')->move('files//upload',$name.'.'.$guessExtension);
                redirect(route('userProfile'));
            }else{
                return redirect()->back()->withErrors(['Plik jest zbyt duży', 'Plik jest zbyt duży']);
            }
        }

        return view('upload.upload');
    }

    /*
     * Load profile with id, name and surname of user
     * Return data of user
     */
    public function getUser($name,$surname,$id){
        if($id == Auth::id()){
            return redirect(route('userProfile'));
        }else{
            $user = \App\User::find($id);

            $photos = \App\User::with(['photos' => function($query){
                $query->with(['comments' => function($query){
                    $query->with(['user'])->get()->all();
                }])->get()->all();
            },'rate','visitors'])->where('id','=',$id)->get()->all();
            $friends = Friends::where('user_id1',$id)->where('user_id2',Auth::id())->orWhere('user_id1',Auth::id())->where('user_id2',$id)->get()->all();
            return view('profile.other',['user' => $user,'photos' => $photos[0],'friends' => $friends]);
        }

    }


    public function notification(){
        $notifications = DB::table('friends')
            ->join('users','friends.user_id2','=','users.id')
            ->select('friends.*','users.*')->where('user_id1',Auth::id())->get()->all();

        return view('notifications.main',['notice' => $notifications]);
    }

    public function getFriends($friends = null){
        $friends = DB::table('friends')
            ->join('users','friends.user_id2','=','users.id')
            ->select('friends.*','users.*')->where('user_id1',Auth::id())->get()->all();
        return view('profile.friends',['friends' => $friends]);
    }

    public function settings(Request $request){

        if($request->get('firstName') != null){
            $user = Auth::user();
            $user->firstName = $request->get('firstName');
            $user->save();
            return redirect(route('userProfile'));
        }
        if($request->get('surname') != null){
            $user = Auth::user();
            $user->surname = $request->get('surname');
            $user->save();
            return redirect(route('userProfile'));
        }
        if($request->get('sex') != null){
            $user = Auth::user();
            $user->sex = $request->get('sex');
            $user->save();
            return redirect(route('userProfile'));
        }
        if($request->get('birthday') != null){
            $user = Auth::user();
            $user->birthday = $request->get('birthday');
            $user->save();
            return redirect(route('userProfile'));
        }
        return view('user.settings');
    }

    /**
     * Handling the upload files
     */
    public function uploadAction(Request $request){

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
