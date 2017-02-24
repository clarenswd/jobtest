<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    // has many Competitor
    public function competitors(){
        return $this->hasMany('App\Competitor');
    }

    //belongs to a meeting
    public function meeting()
    {
        return $this->belongsTo('App\Meeting');
    }

    public function isClosed(){
        return ($this->is_closed == 1) ? "CLOSED" : "OPEN";
    }

}
