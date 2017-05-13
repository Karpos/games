<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function level(){
        return $this->hasOne('App\Level');
    }
    public function plays_on_state(){
        return $this->hasOne('App\u_plays_on');
    }
}
