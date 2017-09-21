<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function activeCourse(){
        return $this->belongsTo('App\ActiveCourse','active_course_id','id');
    }

    public function teacher(){
        return $this->belongsTo('App\Teacher','teacher_id','id');
    }
}
