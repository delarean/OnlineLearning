<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonsController extends StudentController
{

    public function paginateNextLessons(){

        $activeCourses = Auth::user()->student->activeCourses;
        $activeCoursesIds = [];
        $lessons_number = 0;
        $pagination_number = 5;
        $previous_lessons_ids = [];

        foreach ($activeCourses as $activeCourse){
            array_push($activeCoursesIds,$activeCourse->id);
        }

        $all_lessons =  Lesson::whereIn('active_course_id',$activeCoursesIds)
            ->get();

        foreach ($all_lessons as $lesson){
            if(strtotime($lesson->date.' '.$lesson->time) < time())
                array_push($previous_lessons_ids,$lesson->id);
            $lessons_number++;
        }

        if($lessons_number > 5){

            return  Lesson::whereIn('active_course_id',$activeCoursesIds)
                ->whereNotIn('id',$previous_lessons_ids)
                ->orderBy('date')
                ->orderBy('time')
                ->paginate($pagination_number);

        }
        else {
            return  Lesson::whereIn('active_course_id',$activeCoursesIds)
                ->whereNotIn('id',$previous_lessons_ids)
                ->orderBy('date')
                ->orderBy('time')
                ->get();
        }

    }

    public function showLessonsInfo(){


        return view('lessons',[
            'next_lessons' => $this->paginateNextLessons(),

        ]);

    }

}
