<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{

    //should be stored in a table
    public static  $meeting_type = [
        'THOROUGHBRED'  => "T",
        'GREYHOUNDS'  => "G",
        'HARNESS'  => "H",
        ];


    public function races(){
        return $this->hasMany('App\Race');
    }

    public function getTypeMeetingString(){
        $key = array_search($this->type, self::$meeting_type); //
        return $key;
    }
}
