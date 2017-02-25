<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{

    public function races(){
        return $this->hasMany('App\Race');
    }



}
