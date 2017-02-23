<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competitor extends Model
{
    public function race()
    {
        return $this->belongsTo('App\Race');
    }
}
