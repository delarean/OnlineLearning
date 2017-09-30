<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FreeLessonsController extends StudentController
{
public function showFreeLessons(){

    return view('student.freelessons',[
        'next_lesson_date_rus' => $this->makeNextDate(),
        'only_one_lesson' => $this->isOnlyOneLesson(),
    ]);

}
}
