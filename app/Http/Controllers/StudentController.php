<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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


    // Выбираем из бд уроки и расставляем их по порядку
    // @return arr

    protected function getNextLessons(){

        //Сюда складываем модели уроков по порядку
        $next_lessons = [];

        $activeCourses = Auth::user()->student->activeCourses;
        $activeCoursesIds = [];

        foreach ($activeCourses as $activeCourse){
            array_push($activeCoursesIds,$activeCourse->id);
        }

        $lessons = Lesson::whereIn('active_course_id',$activeCoursesIds)->
        orderBy('date')->
        orderBy('time')->
        get();

        foreach ($lessons as $lesson){
            if(strtotime($lesson->date.' '.$lesson->time) < time()) continue;
            array_push($next_lessons,$lesson);
        }

        return $next_lessons;

    }

    //Возвращает имя учителя для ближайшего урока
    public function getNextTeacherName(){

        if(isset($this->getNextLessons()[0]))
        return $this->getNextLessons()[0]->teacher->name;
        else return 'Нет учителя';

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

        if(isset($this->getNextLessons()[0]))
        return $this->getNextLessons()[0]->activeCourse->course->name;
        else return 'Нет урока';

    }

    //Тут выводим всю инфу о студенте
    // (следующий учитель , уроки и кол-во уроков(англ/русск))
    public function showStudentInfo(){

        $next_lessons = $this->getNextLessons();
        $this->getAmountOfLessons();


        if(isset($next_lessons)) {
            if(isset($next_lessons[0]->date)) {
                $this->first_lesson_date = $this->setDateFormat($next_lessons[0]->date);
                $this->first_lesson_time = $this->setTimeFormat($next_lessons[0]->time);
            }
            else{
                $this->first_lesson_date = 'Нет';
                $this->first_lesson_time = 'Уроков';
            }
            if(isset($next_lessons[1]->date)){
                $this->second_lesson_date = $this->setDateFormat($next_lessons[1]->date);
                $this->second_lesson_time = $this->setTimeFormat($next_lessons[1]->time);
            }
            else {
                $this->second_lesson_date = 'Нет';
                $this->second_lesson_time = 'Уроков';
            }



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

    public function changePassword(Request $request){

        $request->validate([
            'current_password' => 'required|max:20',
            'new_password' => 'required|max:20',
        ]);


        $user_model  = Auth::user();

        if (Hash::check($request->input('current_password'), $user_model->getAuthPassword()))  {

            $user_model->fill([
                'password' => Hash::make($request->input('new_password'))
            ])->save();

            return back()->with('message','Смена пароля прошла успешно !');

        }else{
            return back()->with('message','Неправильно введён текущий пароль !');
        }



    }

}
