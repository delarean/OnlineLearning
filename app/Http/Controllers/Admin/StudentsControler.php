<?php

namespace App\Http\Controllers\Admin;

use App\Lesson;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StudentsControler extends Controller
{
    //@return view
    public function show(){
        return view('admin.students',[
            'all_students' => $this->paginateStudents(),
        ]);
    }

    //@return model(collection)
    public function paginateStudents(){
        $all_students = Student::all();
        $pagination_number = 5;
        $records_number = 0;
        //Сюда складываем всех студентов(масив масивов)
        $array_of_all_students = [];
        foreach ($all_students as $student){
            $current_student_info = [];
            $current_student_info['name'] = $student->name;
            $current_student_info['surname'] = $student->surname;
            $current_student_info['e-mail'] = $student['e-mail'];
            $student_active_courses = $student->activeCourses;
            $current_student_info['course_name'] = $this->getCurrentCourse($student);

            $all_amounts_of_lessons = $this->getAmountOfLessons($student_active_courses);

            $current_student_info['amount_of_native'] = $all_amounts_of_lessons['amount_of_native'];
            $current_student_info['amount_of_russian'] = $all_amounts_of_lessons['amount_of_russian'];

            array_push($array_of_all_students,$current_student_info);
            $records_number++;
        }
        if($records_number <= 5) return $array_of_all_students;

        return new LengthAwarePaginator($array_of_all_students,$records_number,$pagination_number);

        }

    //Тут формируем инфу о кол-ве уроков
    //@param collection $active_course
    //@return arr
    public function getAmountOfLessons($active_courses){

        $all_amounts = [];

        $all_amounts['amount_of_native'] = 0;
        $all_amounts['amount_of_russian'] = 0;

        foreach ($active_courses as $active_course) {

            //Является ли носителем
            $is_native = $active_course->course->is_native;

            //Оставшееся кол-во уроков
            $amount_remain = $active_course->amount_remain;

            $all_amounts['amount_of_native'] += $is_native ? $amount_remain : 0;
            $all_amounts['amount_of_russian'] += $is_native ? 0 : $amount_remain;
        }

        return $all_amounts;
    }

    //Возвращает имя текущего курса
    //@param collection $student
    //@return str
    public function getCurrentCourse($student){

        if(isset($this->getNextLessons($student)[0]))
            return $this->getNextLessons($student)[0]->activeCourse->course->name;
        else return 'Нет урока';

    }

    //@param collection $student
    public function getNextLessons($student){

        //Сюда складываем модели уроков по порядку
        $next_lessons = [];

        $activeCourses = $student->activeCourses;
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

    public function addStudent(Request $request){

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
        $student_name = $request->input('name');
        $student_surname = $request->input('surname');
        $student_email = $request->input('email');
        $student_password = Hash::make($request->input('password'));

        $user = new User;
        $user->password = $student_password;
        $user->remember_token = Str::random(20);
        $user->role_id = 2;
        $user->save();

        $student = new Student;
        $student->name = $student_name;
        $student->surname = $student_surname;
        $student['e-mail'] = $student_email;
        $student->user_id = $user['id'];
        $student->save();

        return back();


    }



}
