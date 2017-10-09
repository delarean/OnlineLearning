<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveCourse extends Model
{
    protected $fillable = ['course_id','student_id','teacher_id','amount_remain'];

    protected $table = 'Active_Courses';

    public function course(){
        return $this->belongsTo('App\All_Course', 'course_id', 'id');
    }

    public function student(){
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }

    public function teachers(){
        return $this->belongsToMany('App\Teacher', 'Teachers_ActiveCourses', 'active_course_id', 'teacher_id');
    }

    public function lessons(){
        return $this->hasMany('App\Lesson','active_course_id','id');
    }

}
