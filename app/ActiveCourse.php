<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveCourse extends Model
{
    protected $fillable = ['course_id','student_id','teacher_id','amount_remain'];

    protected $table = 'Active_Courses';

    public function course(){
        return $this->hasOne('App\All_Course', 'course_id', 'id');
    }

    public function student(){
        return $this->hasOne('App\Student', 'student_id', 'id');
    }

    public function teacher(){
        return $this->hasMany('App\Teacher', 'teacher_id', 'id');
    }

}
