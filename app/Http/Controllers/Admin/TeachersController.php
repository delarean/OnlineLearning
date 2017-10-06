<?php

namespace App\Http\Controllers\Admin;

use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TeachersController extends StudentsControler
{
    public function show()
    {
        return view('admin.teachers',[
            'teachers' => $this->getTeachers(Teacher::all()),
        ]);
    }

    public function getTeachers($teachers){

        $teachers_arr = [];

        foreach ($teachers as $teacher){
            $teacher_info_arr = [];

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

    public function searchInDb(Request $request){



    }
}
