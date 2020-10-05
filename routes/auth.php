<?php


Route::get('post','PostController@index')->name('post/index');
Route::get('post/{post}','PostController@show')->name('post/show');

Route::get('/home-dashboard','HomeController@dashboard');
