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

//Widok wejściowy
Route::get('/', function () {
    return view('layouts.app');
});

//Widok strony rejestracji
Route::get('/rejestracja',function (){
    return view('auth.register');
})->name('rejestracja');


Auth::routes();

Route::group(['middleware' => ['web']], function (){

});

Route::match(['get','post'],'/home','User@index');

Route::resource('user','User');