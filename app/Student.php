<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function activeCourse()
    {
        return $this->belongsTo('App\ActiveCourse');
    }
}
