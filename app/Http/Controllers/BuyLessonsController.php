<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyLessonsController extends StudentController
{
    public function showBuyLessons(){
        return view('student.buylessons',[
            'next_lesson_date_rus' => $this->makeNextDate(),
            'only_one_lesson' => $this->isOnlyOneLesson(),
        ]);
    }
}
