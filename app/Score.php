<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['best_score','have_tried'];
    public function user(){
        return $this->belongsTo("App/User");
    }
    public function level(){
        return $this->belongsTo("App/Level");
    }
}
