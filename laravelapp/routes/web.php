<?php

use App\Http\Controllers\PersonController;
use App\Http\Middleware\HelloMiddleware;


Route::get('/', function () {
    return view('welcome');
});


// Route::get(アドレス,関数など);
Route::get('hello','HelloController@index');
    // ->middleware(HelloMiddleware::class);

Route::get('hello/show','HelloController@show');

Route::post('hello','HelloController@post');

Route::get('hello/add','HelloController@add');

Route::post('hello/add','HelloController@create');

Route::get('hello/edit','HelloController@edit');

Route::post('hello/edit','HelloController@update');

Route::get('person','PersonController@index');

Route::get('person/find','PersonController@find');
Route::post('person/find','PersonController@search');

Route::get('person/add','PersonController@add');
Route::post('person/add','PersonController@create');

Route::get('person/edit','PersonController@edit');
Route::post('person/edit','PersonController@update');

Route::get('person/del','PersonController@delete');
Route::post('person/del','PersonController@remove');


Route::get('board','BoardController@index');

Route::get('board/add','BoardController@add');
Route::post('board/add','BoardController@create');

Route::resource('rest','RestappController');

Route::get('hello/session','HelloController@ses_get');
Route::post('hello/session','HelloController@ses_put');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('hello','HelloController@index')->middleware('auth');

Route::get('hello/auth','HelloController@getAuth');
Route::post('hello/auth','HelloController@postAuth');
