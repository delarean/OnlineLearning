<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePasswordController extends StudentController
{
    public function show(Request $request){
        $message = $request->session()->get('message',false);
        if($message) return view('student.changePassword',[
            'message' => $message,
            'next_lesson_date_rus' => $this->makeNextDate(),
            'only_one_lesson' => $this->isOnlyOneLesson(),
        ]);
        return view('student.changePassword',[
            'message' => $message,
            'next_lesson_date_rus' => $this->makeNextDate(),
            'only_one_lesson' => $this->isOnlyOneLesson(),
        ]);
    }
}
