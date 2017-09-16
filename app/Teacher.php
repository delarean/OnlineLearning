<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function activeCourses()
    {
        return $this->belongsToMany('App\ActiveCourse', 'Teachers_ActiveCourses','teacher_id', 'active_course_id');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
