<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $primaryKey = 'l_num';
    public function states(){
        return $this->hasMany('App\State');
    }
    public function game(){
        return $this->belongsTo('App\Game','g_id');
    }
    public function users_played_on(){
        return $this->hasOne('App\User');
    }
    public function plays_on_level(){
        return $this->hasOne('App\u_plays_on');
    }
    public function scores(){
        return $this->hasMany("App/Score");
    }
}
