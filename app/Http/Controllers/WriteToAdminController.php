<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WriteToAdminController extends StudentController
{
    public function show(){
        return view('student.writetoadmin',[
            'next_lesson_date_rus' => $this->makeNextDate(),
            'only_one_lesson' => $this->isOnlyOneLesson(),
        ]);
    }
}
