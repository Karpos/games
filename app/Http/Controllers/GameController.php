<?php

namespace App\Http\Controllers;

use App\Score;
use App\State;
use App\u_plays_on;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use \Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    public function __construct(){

        $this->middleware('jwt.auth');
    }
    public function userSave(Request $request){
 /*       {
            "have_tried":"3",
	"score":"10",
	"l_num":"2",
	"s_save":"{obj0:{{x:10},{y:10}},obj1:{{x:15},{y:15}}}"
}*/

        $currentUser = JWTAuth::parseToken()->authenticate();

        $attrsFromReq = [];
        $haveTried = $request['have_tried'];
        $newScore = $request['score'];
        $l_num = $request['l_num'];
        $stateArr['s_save'] = json_encode($request['s_save']);
        $stateArr['l_num'] = $l_num;
        $score = Score::where([
            ['u_id',$currentUser->id],
            ['l_num',$l_num]
        ])->first();

        $state = new State();
        $state->s_save = $stateArr['s_save'];
        $state->l_num = $l_num;
        $state->save();

        $attrsFromReq['u_id'] = $currentUser->id;
        $attrsFromReq['l_num'] = $l_num;
        $attrsFromReq['s_id'] = $state->id;

        u_plays_on::unguard();
        u_plays_on::create($attrsFromReq);
        u_plays_on::reguard();


        if($score){
           if($score->best_score < $newScore){
               $score->update(['best_score' => $newScore],['have_tried'],$haveTried);
           }
        }else{
            Score::unguard();
            Score::create(array(
                'u_id' => $attrsFromReq['u_id'],
                'l_num' => $attrsFromReq['l_num'],
                'best_score' => $newScore,
                'have_tried' => $haveTried)
            );
            Score::reguard();
        }
        return 'success';
    }
}
