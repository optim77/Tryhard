<?php

namespace App\Http\Controllers;

use App\Friends;
use App\Photos;
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
        return view('profile.base',['user' => Auth::user()]);
    }

    /*
     * Display self profile
     */
    public function profile(){
        $user = \App\User::find(Auth::id());
        $photos = Photos::where('author',Auth::id())->get();
        return view('user.main',['user' => $user,'photos' => $photos]);

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
        return view('search.user');
    }

    /*
     * Function to displaying upload view
     * Return upload view
     */
    public function upload(Request $request){

        if ($request->file('file')){
            if ($request->file('file')->getClientSize() < 500000){
                $photo = new Photos();
                $photo->description = $request->get('description');
                $photo->author =Auth::id();
                $name = uniqid(null,true);
                $guessExtension = $request->file('file')->guessExtension();
                $photo->slug = $name.'.'.$guessExtension;
                $photo->save();
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
            $photos = Photos::with('comments')->where('author',$id)->get()->all();
//        $photos = DB::table('photos')
//            ->join('comments','photos.id','=','comments.photos_id')
//            ->join('users','photos.author','=','users.id')
//            ->select('comments.*','users.firstName','users.surname','users.mainPhoto','photos.*')
//            ->where('photos.author',$id)->get()->all();
//        dump($photos);
            $friends = Friends::where('user_id1',$id)->where('user_id2',Auth::id())->orWhere('user_id1',Auth::id())->where('user_id2',$id)->get()->all();
            return view('profile.other',['user' => $user, 'photos' => $photos,'friends' => $friends]);
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
