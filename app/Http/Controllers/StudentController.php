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



            return view('student.profile',[
                'second_lesson_time' => $this->second_lesson_time,
                'second_lesson_date' => $this->second_lesson_date,
                'first_lesson_time' => $this->first_lesson_time,
                'first_lesson_date' => $this->first_lesson_date,
                'teacher_name' => $this -> getNextTeacherName(),
               'amount_of_native' => $this->amount_of_native,
                'amount_of_russian'  => $this->amount_of_russian,
                 'course_name' => $this->getCurrentCourse(),
                'next_lesson_date_rus' => $this->makeNextDate(),
                'only_one_lesson' => $this->isOnlyOneLesson(),
            ]);
        }
        else{
            return view('student.profile',[
                'second_lesson_time' => 'Нет',
                'second_lesson_date' => 'Уроков',
                'first_lesson_time' => 'Нет',
                'first_lesson_date' => 'Уроков',
                'next_lesson_date_rus' => $this->makeNextDate(),
                'only_one_lesson' => 1,
            ]);
        }

    }

    //@return bul
    public function isOnlyOneLesson(){
        $next_lessons = $this->getNextLessons();
        if(!isset($next_lessons)) return 1;
        $is_only_one_lesson = isset($next_lessons[1]) ? 0 : 1 ;
        return $is_only_one_lesson;
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

    //@return array
    public function setDateToRUS($date){
        $date_array = [];
        $weak_day_number =  date('N',strtotime($date));
        switch ($weak_day_number){
            case 1:
                $weak_day = 'ПОНЕДЕЛЬНИК';
                break;
            case 2:
                $weak_day = 'ВТОРНИК';
                break;
            case 3:
                $weak_day = 'СРЕДА';;
                break;
            case 4:
                $weak_day = 'ЧЕТВЕРГ';;
                break;
            case 5:
                $weak_day = 'ПЯТНИЦА';;
                break;
            case 6:
                $weak_day = 'СУББОТА';;
                break;
            case 7:
                $weak_day = 'ВОСКРЕСЕНЬЕ';;
                break;
            default:
                $weak_day = "что-то не так с днём недели";
        }

        $date_array['weak_day'] = $weak_day;

        $day_of_month_number =  date('j',strtotime($date));

        $date_array['day_of_month_number'] = $day_of_month_number;

        $number_of_month = date('n',strtotime($date));

        switch ($number_of_month){
            case 1:
                $name_of_month = 'ЯНВАРЯ';
                break;
            case 2:
                $name_of_month = 'ФЕВРАЛЯ';
                break;
            case 3:
                $name_of_month = 'МАРТА';;
                break;
            case 4:
                $name_of_month = 'АПРЕЛЯ';;
                break;
            case 5:
                $name_of_month = 'МАЯ';;
                break;
            case 6:
                $name_of_month = 'ИЮНЯ';;
                break;
            case 7:
                $name_of_month = 'ИЮЛЯ';;
                break;
            case 8:
                $name_of_month = 'АВГУСТА';
                break;
            case 9:
                $name_of_month = 'СЕНТЯБРЯ';
                break;
            case 10:
                $name_of_month = 'ОКТЯБРЯ';
                break;
            case 11:
                $name_of_month = 'НОЯБРЯ';
                break;
            case 12:
                $name_of_month = 'ДЕКАБРЯ';
                break;
            default:
                $name_of_month = "что-то не так с названием месяца";
        }

        $date_array['name_of_month'] = $name_of_month;

        return $date_array;
    }

    //@return str
    public function makeNextDate(){

        $next_lessons = $this->getNextLessons();
        if(isset($next_lessons[0])){

            $next_lesson = $next_lessons[0];

            $rus_date_arr = $this->setDateToRUS($next_lesson->date);
            $time = $this->setTimeFormat($next_lesson->time);

            $next_lesson_date_str = $rus_date_arr['weak_day'].' ';
            $next_lesson_date_str .= $rus_date_arr['day_of_month_number'].' ';
            $next_lesson_date_str .= $rus_date_arr['name_of_month'].', '.$time;

            return $next_lesson_date_str;

        }

        return 'Нет уроков';
    }

}
