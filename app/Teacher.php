<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function ActiveCourse()
    {
        return $this->belongsTo('App\Student');
    }
}
