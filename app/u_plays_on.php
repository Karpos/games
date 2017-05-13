<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Traits\HasCompositePrimaryKey;

class u_plays_on extends Model
{
    protected $primaryKey = "u_id";
    public function users_played(){
        return $this->belongsToMany('App\User');
    }
    public function states_played(){
        return $this->belongsToMany('App\State');
    }
    public function levels_played(){
        return $this->belongsToMany('App\Level');
    }
}
