<?php

use App\Http\Middleware\HelloMiddleware;


Route::get('/', function () {
    return view('welcome');
});


// Route::get(アドレス,関数など);
Route::get('hello','HelloController@index');
    // ->middleware(HelloMiddleware::class);

Route::post('hello','HelloController@post');