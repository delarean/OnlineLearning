<?php

namespace App\Http\Controllers\Admin;

use App\Lesson;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class LessonsController extends StudentsControler
{
    public function showLessons(Request $request){

        if(!$request->has('lesson') || !$request->filled('lesson'))
            return "Нет такой страницы";

        $lessons_type = $request->input('lesson');

            return view('admin.lessons',[
                'lessons' => $this->paginateLessons($lessons_type),
                'lessons_type' => $lessons_type,
            ]);

    }

    public function paginateLessons($lesson_type){

        $pagination_number = 5;
        $lessons_number = 0;
        $all_lessons = Lesson::all();
        $bad_lessons_ids = [];

        foreach ($all_lessons as $lesson){
            if($lesson_type === 'next'){
                if(strtotime($lesson->date.' '.$lesson->time) < time())
                    array_push($bad_lessons_ids,$lesson->id);
            }
            else if($lesson_type === 'previous'){
                if(strtotime($lesson->date.' '.$lesson->time) > time())
                    array_push($bad_lessons_ids,$lesson->id);
            }
        }



            $lessons_arr = [];

            $lessons_collection = Lesson::whereNotIn('id',$bad_lessons_ids)
                ->orderBy('date')
                ->orderBy('time')
                ->get();

            foreach ($lessons_collection as $lesson){

                $lessons_data = [];

                $student = $lesson->activeCourse->student;

                $lessons_data['date'] = $this->setRusDateFormat($lesson->date);
                $lessons_data['time'] = $this->cutTimeNulls($lesson->time);
                $lessons_data['student_name'] = $student->name;
                $lessons_data['id'] = $lesson->id;
                $amounts_of_lessons = $this->getAmountOfLessons($student->activeCourses);
                $lessons_data['amount_of_native'] = $amounts_of_lessons['amount_of_native'];
                $lessons_data['amount_of_russian'] = $amounts_of_lessons['amount_of_russian'];


                switch ($lesson->status){

                    case 'По расписанию' :
                        $lessons_data['status'] = 0;
                        break;
                    case 'Отменён' :
                        $lessons_data['status'] = 1;
                        break;
                    case 'Перенесён' :
                        $lessons_data['status'] = 2;
                        break;
                    case 'Урок ожидается' :
                        $lessons_data['status'] = 3;
                        break;
                    case 'Замена преподавателя' :
                        $lessons_data['status'] = 4;
                        break;

                }

                $lessons_data['status_name'] = $lesson->status;

                array_push($lessons_arr,$lessons_data);

                $lessons_number++;

            }

        if($lessons_number > $pagination_number){

            $lessons_arr = Collection::make($lessons_arr);

            return $this->collection_paginate($lessons_arr,$pagination_number);

        }
        else return $lessons_arr;

    }

    //@return str
    //@param str
    public function setRusDateFormat($date){

        $date_values = explode('-',$date);
        $reversed_date_values = array_reverse($date_values);
        $new_date = '';
        foreach ($reversed_date_values as $date_value){

            if(isset($not_first_itteration))
            $new_date .= '.'.$date_value;

            else $new_date .= $date_value;
            $not_first_itteration = 1;
        }

        return $new_date;
    }

    public function cutTimeNulls($time){

        $time_values = explode(':',$time);
        $time_str = $time_values[0].':';
        $time_str .= $time_values[1];

        return $time_str;
    }

    public function collection_paginate($items, $per_page)
    {
        $page   = \Illuminate\Support\Facades\Request::get('page', 1);
        $offset = ($page * $per_page) - $per_page;

        return new LengthAwarePaginator(
            $items->forPage($page, $per_page)->values(),
            $items->count(),
            $per_page,
            Paginator::resolveCurrentPage(),
            ['path' => Paginator::resolveCurrentPath()]
        );
    }

    public function changeStatus(Request $request){

        if(!$request->has('status') || !$request->filled('status'))
            return "Нет такой страницы";
        $lesson_status = explode('|',$request->input('status'));
        $lesson_id = $lesson_status[0];
        $lesson_status_name = $lesson_status[1];

        $lesson = Lesson::find($lesson_id);
        $lesson->status = $lesson_status_name;
        $lesson->save();
        return back()->withInput();

    }


}
