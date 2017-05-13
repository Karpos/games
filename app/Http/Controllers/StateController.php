<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class StateController extends Controller
{
    public function __construct(){

        $this->middleware('jwt.auth');

    }
    public function getStates(Request $request){
        $l_num = $request['l_num'];
        $currentUser = JWTAuth::parseToken()->authenticate();

        $result = DB::table('u_plays_ons')
            ->join('states','u_plays_ons.s_id','=','states.id')//states.id,states.s_save,states.l_num
            ->where([['u_plays_ons.u_id',$currentUser->id],['u_plays_ons.l_num',$l_num]])
            ->addSelect(['states.id','states.l_num'])
            ->get();
        if(!$result->isEmpty()) {
            return $result;
        }
        else {
            return "no savings";
        }
    }
    public function state(Request $request){
        $s_id = $request['id'];
        $state = State::where('id',$s_id)->first();
        if($state)
            return $state->s_save;
        else
            return 'not_exisitng_object';
    }

}
