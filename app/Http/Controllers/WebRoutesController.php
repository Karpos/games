<?php
/**
 * Created by PhpStorm.
 * User: Karposh
 * Date: 5/16/2017
 * Time: 15:04
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class WebRoutesController extends Controller{
    public function __construct(){
        $this->middleware('jwt.auth',['except' => ['getLogin']]);
    }
    public function getLogin(){
        return response()->file(public_path().'\front_end\authentication\login.html');
    }
    public function getGames(Request $request){
        return response()->file(public_path().'\front_end\games.html');
    }
    public function getTokenError(Request $request){
        return response()->file(public_path().'\front_end\authentication\token_error.html');
    }
    public function getGame(Request $request){
        $game = $request['game'];
        $path = public_path().'\front_end\games\\'.$game.'\\'.$game.'.html';
        return response()->file($path);
    }
    public function getResurce(){
        die("resource");
        return response()->file(public_path().'\front_end\games\.html');
    }
}