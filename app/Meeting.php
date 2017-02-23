<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{

    //should be stored in a table
//    var $type = [
//        'THOROUGHBRED'  => "T",
//        'GREYHOUNDS'  => "G",
//        'HARNESS'  => "H",
//        ];

    //
    public function races(){
        return $this->hasMany('App\Race');
    }
}
