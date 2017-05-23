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

Route::get('/',[
    'uses' => 'WebRoutesController@getLogin',
    'as' =>  'web.login',
]);

Route::get('/games',[
    'uses' => 'WebRoutesController@getGames',
    'as' =>  'web.games',
]);
Route::get('/error',[
    'uses' => 'WebRoutesController@getTokenError',
    'as' =>  'web.error',
]);
Route::get('/game',[
    'uses' => 'WebRoutesController@getGame',
    'as' =>  'web.game',
]);
Route::get('/resource/{game}/{filename}',function ($game,$filename){
    $path = public_path() . 'front_end/games/'.$game.'/'.$filename;
    return $path;
});

