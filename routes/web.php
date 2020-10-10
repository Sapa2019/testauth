<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/user','UserController@index');
Route::get('/user1','UserController@index1');
Route::post('/user2','UserController@index2');
Route::post('/avatars','UserController@index2');
Route::post('/book','BookController@store');
Route::patch('/books/{book}','BookController@update');
Route::delete('/books/{book}','BookController@delete');

Route::post('/author','AuthorController@store');

Route::get('/func',function(){
   dd(SoGood('Sapa'));
});
Route::get('/pow',function(){
    dd(PowNum(0));
});

//Route::get('/func','UserController@Func');

//Route::middleware(['before','after'])->get('/',function(){
//   return response()->json(['hello'=>'world']);
//});

//Route::get('/home-dashboard','HomeController@dashboard');

Route::middleware(['before','after'])->get('/example', function (Request $request){
    return ['hello'=>'Hala Madrid'];
});



//Route::middleware('auth')->group(function(){
//    Route::get('post','PostController@index')->name('post/index');
//    Route::get('post/{post}','PostController@show')->name('post/show');
//
//});
