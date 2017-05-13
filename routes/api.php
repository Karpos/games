<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('authenticate', 'AuthenticateController', ['middleware' => 'cors','only' => ['index']]);
//input: email, password
Route::post('authenticate',[
    'middleware' => ['api', 'cors'],
    'uses' => 'AuthenticateController@authenticate',
    'as' =>  'authenticate.login',
]);
//input: name, email, password
Route::post('signup',[
    'middleware' => ['api', 'cors'],
    'uses' => 'AuthenticateController@signup',
    'as' =>  'authenticate.signup',
]);
//input: have_tried, score, l_num, s_save
Route::post('usersave',[
    'middleware' => ['api', 'cors'],
    'uses' => 'GameController@usersave',
    'as' =>  'game.save',
]);
//input: l_num;
Route::post('getstates',[
    'middleware' => ['api', 'cors'],
    'uses' => 'StateController@getStates',
    'as' =>  'state.getstates',
]);
////input: s_id
Route::post('state',[
    'middleware' => ['api', 'cors'],
    'uses' => 'StateController@state',
    'as' =>  'state.state',
]);
//input: l_num
Route::post('scores',[
    'middleware' => ['api', 'cors'],
    'uses' => 'ScoreController@scores',
    'as' =>  'score.scores',
]);