<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function __construct(){

        $this->middleware('jwt.auth');
    }
    public function getLevelsForGame(Request $request){
        return Level::all()->where('g_id',$request['g_id']);
    }
}
