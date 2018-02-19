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

Route::match(['get','post'],'/profil','User@profile')->name('userProfile');

Route::resource('user','User');


//SECTION TO SEARCH
Route::match(['get','post'],'/search/{search?}','User@searchUsers')->name('search');

//SHOW OTHER PERSON PROFILE
Route::match(['get','post'],'/profile/{name}-{surname}-{id}','User@getUser')->name('getUserProfile');

//UPLOAD FILE
Route::match(['get','post'],'/upload','User@upload')->name('upload');
Route::post('/upload/action','User@uploadAction')->name('uploadAction');

//AJAX RESOURCES
Route::post('/ajax/addToFriends','AjaxController@addToFriends')->name('AJAXADDTOFRIENDS');
Route::post('/ajax/deleteFromFriends','AjaxController@deleteFromFriends')->name('AJAXDELETEFROMFRIENDS');
Route::post('/ajax/blockFriends','AjaxController@blockUser')->name('AJAXBLOCKUSER');
Route::post('/ajax/unlockFriends','AjaxController@unlockFriends')->name('AJAXUNLOCK');

