<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentTeacherController extends StudentController
{

    public function showTeacherInfo(){

        $this->getNextLessons();
        $next_teacher = $this->setNextLessons()[0]->teacher;


        return view('teacher',[
            'teacher_name' => $next_teacher->name,
            'teacher_birthday' => $next_teacher->birthday,
            'teacher_mail' => $next_teacher['e-mail'],
            'teacher_skype' => $next_teacher->skype,
            'teacher_country' => $next_teacher->country,
            'teacher_experience' => $next_teacher->experience,
        ]);

    }
}
