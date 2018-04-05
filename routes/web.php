<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//FRONT VIEW
Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/login', function () {

    return redirect()->route('home');
});

//REGISTER VIEW
Route::get('/rejestracja',function (){
    return view('auth.register');
})->name('rejestracja');


Auth::routes();

Route::group(['middleware' => ['web']], function (){

});

Route::match(['get','post'],'/home','User@index')->name('home');
//SELF PROFILE
Route::match(['get','post'],'/profil','User@profile')->name('userProfile');

//SETTINGS TO SELF PROFILEF
Route::match(['get','post'],'/ustawienia','User@settings')->name('profileSettings');

Route::resource('user','User');

//NOTIFICATIONS PAGE
Route::get('/powiadomienia','User@notification')->name('notification');

//SECTION TO SEARCH
Route::match(['get','post'],'/search/{search?}','User@searchUsers')->name('search');

//SHOW OTHER PERSON PROFILE
Route::match(['get','post'],'/profile/{name}-{surname}-{id}','User@getUser')->name('getUserProfile');

//UPLOAD FILE
Route::match(['get','post'],'/upload','User@upload')->name('upload');
Route::post('/upload/action','User@uploadAction')->name('uploadAction');

//AJAX RESOURCES
Route::post('/ajax/addToFriends','AjaxController@addToFriends')->name('AJAXADDTOFRIENDS');
Route::post('/ajax/accept','AjaxController@acceptInvite')->name('AJAXACCEPTINVITE');
Route::post('/ajax/deleteFromFriends','AjaxController@deleteFromFriends')->name('AJAXDELETEFROMFRIENDS');
Route::post('/ajax/blockFriends','AjaxController@blockUser')->name('AJAXBLOCKUSER');
Route::post('/ajax/unlockFriends','AjaxController@unlockFriends')->name('AJAXUNLOCK');
Route::post('/ajax/commentAction','AjaxController@commentAction')->name('AJAXCOMMENT');
Route::post('/ajax/setProfileImage','AjaxController@setProfileImage')->name('AJAXSETIMAGE');

//SHOW FRIENDS PAGE
Route::get('/znajomi','User@getFriends')->name('getFriends');

//SHOW ROLLER PAGE
Route::match(['get','post'],'/losuj','RollerController@roller')->name('rollerPage');
Route::post('/roller','RollerController@getRoll')->name('getRoll');

//AJAX ADD VIEWERS
Route::post('/addVisitor','VisitorsController@addVisitor')->name('addViewers');

//SHOW PAGE WITH VIEWERS
Route::get('/odwiedzajacy','VisitorsController@getVisitorsPage')->name('visitorsPage');

//GET RATE PHOTOS
Route::post('/ocen','RateController@getRate')->name('rate');
Route::post('/unlike','RateController@unlike')->name('unlike');

//DISPLAY SINGLE PHOTO
Route::match(['get','post'],'/zdjecie/{photo}','PhotosController@displayPhoto')->name('displayPhoto');

//DISPLAY PAGE WITH CHAT
Route::match(['get','post'],'/chat','ChatController@baseChat')->name('baseChat');