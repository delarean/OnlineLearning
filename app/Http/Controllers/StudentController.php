<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //Изменяем формат вывода даты
    public function setDateFormat($date){

     $weak_day_number =  date('N',strtotime($date));
        switch ($weak_day_number){
            case 1:
                $weak_day = 'ПН';
                break;
            case 2:
                $weak_day = 'ВТ';
                break;
            case 3:
                $weak_day = 'СР';;
                break;
            case 4:
                $weak_day = 'ЧТ';;
                break;
            case 5:
                $weak_day = 'ПТ';;
                break;
            case 6:
                $weak_day = 'СБ';;
                break;
            case 7:
                $weak_day = 'ВС';;
                break;
            default:
                $weak_day = "что-то не так с днём недели";
        }

        return $weak_day;


    }

    //Изменяем формат вывода времени
    public function setTimeFormat($time){

        $new_time = '';
        $splited_time = explode(':',$time);
        $splited_time[2] = '-';
        foreach ($splited_time as $time_part){
           if(!isset($was_used)) $new_time.=$time_part.':';
           else $new_time.=$time_part.' ';
            $was_used = true;
        }

        return $new_time;

    }

    //Выбираем из бд ближайшие 2 урока
    protected function setNextLessons(){

        $activeCourses = Auth::user()->student->activeCourses;

        foreach ($activeCourses as $activeCourse){
            $lessons = $activeCourse->lessons;
            foreach ($lessons as $lesson){
                if(strtotime($lesson->date.' '.$lesson->time) < time()) continue;

                if(!isset($current_lesson_time) || !isset($current_lesson_date)){
                    $this->nextLessonModel = $lesson;
                    $previous_lesson_time = $lesson->time;
                    $previous_lesson_date = $lesson->date;
                    $current_lesson_time = $lesson->time;
                    $current_lesson_date = $lesson->date;
                    continue;
                }
                elseif ($current_lesson_date < $lesson->date
                ){
                    continue;
                }
                elseif ($current_lesson_date == $lesson->date){
                    if($current_lesson_time == $lesson->time || $current_lesson_time < $lesson->time) continue;
                    elseif($current_lesson_time > $lesson->time){
                        $this->nextLessonModel = $lesson;
                        $previous_lesson_time = $current_lesson_time;
                        $previous_lesson_date = $current_lesson_date;
                        $current_lesson_time = $lesson->time;
                        $current_lesson_date = $lesson->date;
                        continue;
                    }
                }
                elseif($current_lesson_date > $lesson->date){
                    $this->nextLessonModel = $lesson;
                    $previous_lesson_time = $current_lesson_time;
                    $previous_lesson_date = $current_lesson_date;
                    $current_lesson_time = $lesson->time;
                    $current_lesson_date = $lesson->date;
                    continue;
                }
            }
        }

        $this->second_lesson_time = $previous_lesson_time;
        $this->second_lesson_date = $previous_lesson_date;
        $this->first_lesson_time = $current_lesson_time;
        $this->first_lesson_date = $current_lesson_date;



    }

    //Возвращает имя учителя для ближайшего урока
    public function getNextTeacherName (){

        return $this->nextLessonModel->teacher->name;

    }

    //Тут формируем инфу о кол-ве уроков
    public function getAmountOfLessons(){


        $active_courses = Auth::user()->student->activeCourses;

        $this->amount_of_native = 0;
        $this->amount_of_russian = 0;
        foreach ($active_courses as $active_course){

            //Является ли носителем
            $is_native = $active_course->course->is_native;

            //Оставшееся кол-во уроков
            $amount_remain = $active_course->amount_remain;

            $this->amount_of_native += $is_native ?  $amount_remain : 0;
            $this->amount_of_russian += $is_native ?  0 : $amount_remain;
        }


    }

    //Возвращает имя текущего курса
    public function getCurrentCourse(){

        $next_lesson = $this->nextLessonModel;
        return $next_lesson->activeCourse->course->name;

    }

    //Тут выводим всю инфу о студенте
    // (следующий учитель , уроки и кол-во уроков(англ/русск))
    public function showStudentInfo(){

        $this -> setNextLessons();
        $this->getAmountOfLessons();



        if(isset($this->first_lesson_time)
            && isset($this->first_lesson_date)
            && isset($this->second_lesson_time)
            && isset($this->second_lesson_date)
            ) {

            $this->first_lesson_date = $this->setDateFormat($this->first_lesson_date);
            $this->second_lesson_date = $this->setDateFormat($this->second_lesson_date);
            $this->first_lesson_time = $this->setTimeFormat($this->first_lesson_time);
            $this->second_lesson_time = $this->setTimeFormat($this->second_lesson_time);


            return view('profile',[
                'second_lesson_time' => $this->second_lesson_time,
                'second_lesson_date' => $this->second_lesson_date,
                'first_lesson_time' => $this->first_lesson_time,
                'first_lesson_date' => $this->first_lesson_date,
                'teacher_name' => $this -> getNextTeacherName(),
               'amount_of_native' => $this->amount_of_native,
                'amount_of_russian'  => $this->amount_of_russian,
                 'course_name' => $this->getCurrentCourse(),
            ]);
        }
        else{
            return view('profile',[
                'second_lesson_time' => 'Нет',
                'second_lesson_date' => 'Уроков',
                'first_lesson_time' => 'Нет',
                'first_lesson_date' => 'Уроков',
            ]);
        }

    }
}
