<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentTeacherController extends StudentController
{

    public function showTeacherInfo(){

        $this->getNextLessons();
        $next_lessons = $this->getNextLessons();
        if(isset($next_lessons[0])){
            $next_teacher =  $this->getNextLessons()[0]->teacher;
            return view('teacher',[
                'teacher_name' => $next_teacher->name,
                'teacher_birthday' => $next_teacher->birthday,
                'teacher_mail' => $next_teacher['e-mail'],
                'teacher_skype' => $next_teacher->skype,
                'teacher_country' => $next_teacher->country,
                'teacher_experience' => $next_teacher->experience,
            ]);
        }
        else{
            return view('teacher',[
                'teacher_name' => "Нет учителя",
                'teacher_birthday' => "Нет учителя",
                'teacher_mail' => "Нет учителя",
                'teacher_skype' => "Нет учителя",
                'teacher_country' => "Нет учителя",
                'teacher_experience' => "Нет учителя",
            ]);
        }


    }
}
