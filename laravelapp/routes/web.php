<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('hello','HelloController@index');
Route::get('hello/other','HelloController@other');