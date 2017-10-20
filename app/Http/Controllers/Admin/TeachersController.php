<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\StudentController;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class TeachersController extends StudentsControler
{
    public function show()
    {

        if(session()->exists('not_found')) {
            return view('admin.teachers',[
                'not_found' => 1,
            ]);
        }

        if(session()->exists('searched_teachers'))
            $teachers = session()->get('searched_teachers');
        else $teachers = Teacher::all();

        return view('admin.teachers',[
            'teachers' => $this->getTeachers($teachers),
        ]);
    }

    public function getTeachers($teachers){

        $teachers_arr = [];

        foreach ($teachers as $teacher){
            $teacher_info_arr = [];

            $teacher_info_arr['id'] = $teacher->id;
            $teacher_info_arr['name'] = $teacher->name;
            $teacher_info_arr['surname'] = $teacher->surname;
            $teacher_info_arr['country'] = $teacher->country;
            $teacher_info_arr['e-mail'] = $teacher['e-mail'];

            $next_lessons = $this->getNextLessons($teacher);
            $teacher_info_arr['students_amount'] = $this->getTeachersStudentsAmount($next_lessons);

            array_push($teachers_arr,$teacher_info_arr);

        }

        return $teachers_arr;

    }

    //@param collection $teacher
    //@return array of lessons collection
    public function getNextLessons($teacher){

        //Сюда складываем модели уроков по порядку
        $next_lessons = [];

        $lessons = $teacher->
        lessons()->
        orderBy('date')->
        orderBy('time')->
        get();

        foreach ($lessons as $lesson){
            if(strtotime($lesson->date.' '.$lesson->time) < time()) continue;
            array_push($next_lessons,$lesson);
        }

        return $next_lessons;

    }

    //@param arr $next_lessons
    //@return int
    public function getTeachersStudentsAmount($next_lessons){

        $courses_ids = [];
        $students_ids = [];

        foreach ($next_lessons as $next_lesson){

            $current_course_id = $next_lesson['active_course_id'];
            if(in_array($current_course_id,$courses_ids)) continue;

            array_push($courses_ids,$current_course_id);

            $student_id = $next_lesson->activeCourse->student_id;
            if(in_array($student_id,$students_ids)) continue;
            array_push($students_ids,$student_id);

            }

            return count($students_ids);

    }

    public function addTeacher(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|max:20'
        ]);

        if ($validator->fails()){

            return back()->withErrors($validator)
                ->withInput();

        }

        //Валидация успешная
        $teacher_name = $request->input('name');
        $teacher_surname = $request->input('surname');
        $teacher_email = $request->input('email');
        $teacher_password = Hash::make($request->input('password'));

        $user = new User;
        $user->password = $teacher_password;
        $user->remember_token = Str::random(20);
        $user->role_id = 1;
        $user->save();

        $teacher = new Teacher;
        $teacher->name = $teacher_name;
        $teacher->surname = $teacher_surname;
        $teacher['e-mail'] = $teacher_email;
        $teacher->user_id = $user['id'];
        $teacher->save();

        return back();

    }

    public function searchTeachers(Request $request){

        if(!$request->has('search') || !$request->filled('search')) return back();

        $search_str = $request->input('search');

        $teachers_by_column = Teacher::where('name','like','%'.$search_str.'%')
            ->orWhere('surname','like','%'.$search_str.'%')
            ->orWhere('country','like','%'.$search_str.'%')
            ->orWhere('e-mail','like','%'.$search_str.'%')
            ->get();

        if($teachers_by_column->isNotEmpty()){
            return back()->with('searched_teachers',$teachers_by_column)->withInput();
        }
        //Не нашёл студента по полной строке
        else{

            //Тут понимаем ,что по целой
            // строке ничего не найти

            //Делим на строки
            $exploded_str = explode(' ',$search_str);
            //Проверяем удалось ли разделить
            if(isset($exploded_str) && (count($exploded_str) < 2)){
                //Строку нельзя разделить
                return back()->with('not_found',1)->withInput();
            }
            else{
                //Разделили строку

                if(isset($exploded_str)) {
                    //Ищем по имени и фамилии одновременно

                    //Порядок имя,фамилия
                    $teachers = Teacher::where('name', 'like', $exploded_str[0])
                        ->where('surname', 'like', $exploded_str[1])
                        ->get();
                    if ($teachers->isNotEmpty())
                        return back()->with('searched_teachers', $teachers)->withInput();

                    //Порядок фамилия,имя
                    $teachers = Teacher::where('name', 'like', $exploded_str[1])
                        ->where('surname', 'like', $exploded_str[0])
                        ->get();
                    if ($teachers->isNotEmpty())
                        return back()->with('searched_teachers', $teachers)->withInput();

                }

                //Не нашли таким образом
                return back()->with('not_found', 1)->withInput();

            }

        }

    }

    public function showTeacherInfo(Request $request){



        $teacher_id = $request->id;
        $teacher = Teacher::where('id',$teacher_id)->first();

        $teacher_type_str = $teacher->is_native ? 'Носитель языка'
            : 'Русскоговорящий';

        $next_lessons = $this->getNextLessons($teacher);

            return view('admin.teacherInfo',[
                'teacher' => $teacher,
                'teacher_type' => $teacher_type_str,
                'date_of_birth' => $this->changeDateDelimiterAndOrder($teacher->birthday,'-','.'),
                'amount_of_students' => $this->getTeachersStudentsAmount($next_lessons),
                'conducted_lessons' => $this->getAmountOfConductedLessons($teacher),
                'conducted_lessons_after_payout' => $this->getAmountOfLessonsAfterPayout($teacher),
            ]);
        }

        //@param coll $teacher
        //@return int
    public function getAmountOfConductedLessons($teacher){

            $this->date = date('Y-m-d');
            $this->time = date('H:i:s');

        $lessons = $teacher->lessons()->where('date','<=',$this->date)->get();
       $previous_lessons =  $lessons->reject(function ($item){
           if($item->status !== 'По расписанию')
               return true;
           if($item->date == $this->date)
        return $item->time > $this->time;
          else return false;
        });

       return $previous_lessons->count();

    }

    //@param coll $teacher
    //@return coll
    public function getConductedLessons($teacher){

        $this->date = date('Y-m-d');
        $this->time = date('H:i:s');

        $lessons = $teacher->lessons()->where('date','<=',$this->date)->get();
        $previous_lessons =  $lessons->reject(function ($item){
            if($item->status !== 'По расписанию')
                return true;
            if($item->date == $this->date)
                return $item->time > $this->time;
            else return false;
        });

        $new_previous_lessons = new Collection();

        foreach ($previous_lessons as $previous_lesson){
            $new_previous_lessons = $new_previous_lessons->push($previous_lesson);
        }

        return $new_previous_lessons;

    }

    public function getAmountOfLessonsAfterPayout($teacher){

        $last_payout_date_time = $teacher->payouts()
            ->where('created_at','<=',date('Y-m-d H:i:s'))
            ->orderBy('created_at')
            ->get(['created_at'])
            ->last();

        if(!isset($last_payout_date_time))
            return 0;

        $this->dateTime = strtotime($last_payout_date_time['created_at']);

        //return $this->dateTime;

        $conducted_lessons = $this->getConductedLessons($teacher);
        //return $conducted_lessons[0]->date < $this->date;

        //Оставляем уроки которые после последней выплаты
        if(!isset($conducted_lessons))
            return 0;

        //return $conducted_lessons;

        $conducted_lessons_after_payout = $conducted_lessons->reject(function ($lesson){
                if($this->dateTime <= strtotime($lesson->date.' '.$lesson->time))
                    return false;
                return true;
            });

        return $conducted_lessons_after_payout->count();
    }

    public function changeTeacherInfo(Request $request){

        $teacher_id = $request->id;
        $all_request_data = $request->all();
        $accepted_request_data = [
            'birthday',"e-mail","is_native",
            "telephone","skype","country",
            "yandex_money","rate",
        ];

        $teacher = Teacher::where('id',$teacher_id)->first();

        foreach ($all_request_data as $request_datum => $request_datum_value){
            if(!in_array($request_datum,$accepted_request_data)) continue;
            if(!$request->filled($request_datum)) continue;
            if($request_datum == 'birthday')
                $request_datum_value = $this->changeDateDelimiterAndOrder($request_datum_value,'.','-');

            $teacher[$request_datum] = $request_datum_value;

        }

        $teacher->save();
        return back();

    }
}
