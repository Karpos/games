<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;


class ScoreController extends Controller
{
    public function __construct(){

        $this->middleware('jwt.refresh');
        $this->middleware('jwt.auth');
    }
    public function scores(Request $request){
        $currentUser = JWTAuth::parseToken()->authenticate();

        $l_num = $request['l_num'];
        $result = DB::table('scores')
            ->join('users','users.id','=','scores.u_id')
            ->where('scores.l_num',$l_num)
            ->orderBy('scores.best_score','desc')
            ->addSelect(['users.email','scores.best_score','scores.have_tried'])

            ->get();
        if(!$result->isEmpty()) {
            return $result;
        }
        else {
            return "no scores for this level";
        }

    }
}
