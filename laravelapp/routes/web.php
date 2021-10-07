<?php

use App\Http\Middleware\HelloMiddleware;


Route::get('/', function () {
    return view('welcome');
});


// Route::get(アドレス,関数など);
Route::get('hello','HelloController@index');
    // ->middleware(HelloMiddleware::class);

Route::post('hello','HelloController@post');

Route::get('hello/add','HelloController@add');

Route::post('hello/add','HelloController@create');

Route::get('hello/edit','HelloController@edit');

Route::post('hello/edit','HelloController@update');