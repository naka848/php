<?php

Route::get('/', function () {
    return view('welcome');
});


// Route::get(アドレス,関数など);
Route::get('hello','HelloController@index');

Route::post('hello','HelloController@post');