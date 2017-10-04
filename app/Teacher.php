<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function lessons()
    {
        return $this->hasMany('App\Lesson','teacher_id', 'id');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
