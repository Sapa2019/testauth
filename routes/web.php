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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
