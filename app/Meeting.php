<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{

    //should be stored in a table
    public $meeting_type = [
        'THOROUGHBRED'  => "T",
        'GREYHOUNDS'  => "G",
        'HARNESS'  => "H",
        ];


    public function races(){
        return $this->hasMany('App\Race');
    }

    public function getTypeAttribute($value)
    {
        $key = array_search($value, $this->meeting_type);
        return $key;

    }


}
