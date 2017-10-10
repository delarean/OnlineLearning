<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }
}
