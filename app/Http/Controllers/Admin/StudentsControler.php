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

        if(session()->exists('not_found')) {
            return view('admin.students',[
                'not_found' => 1,
            ]);
        }

            if(session()->exists('searched_students'))
                $students = session()->get('searched_students');
            else $students = Student::all();

        return view('admin.students',[
            'all_students' => $this->getStudents($students),
        ]);
    }

    //@return model(collection)
    public function getStudents($students){
        //Сюда складываем всех студентов(масив масивов)
        $array_of_all_students = [];
        foreach ($students as $student){
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
        }
         return $array_of_all_students;

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
    //@return arr
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

    public function searchStudents(Request $request){

        if(!$request->has('search') || !$request->filled('search')) return back();

        $search_str = $request->input('search');

        $students_by_column = Student::where('name','like',$search_str)
            ->orWhere('surname','like',$search_str)
            ->orWhere('e-mail','like',$search_str)
            ->get();

        if($students_by_column->isNotEmpty()){
            return back()->with('searched_students',$students_by_column)->withInput();
        }
        //Не нашёл студента по полной строке
        else{

            //Ищем по названию курса
            $all_students = Student::all();
            $students_to_show = [];
            foreach ($all_students as $student){

                $current_course_name = $this->getCurrentCourse($student);
                if($current_course_name === $search_str)
                    array_push($students_to_show,$student);

            }
            if(!empty($students_to_show)) return back()->with('searched_students',$students_to_show)->withInput();

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
                    $students = Student::where('name', 'like', $exploded_str[0])
                        ->where('surname', 'like', $exploded_str[1])
                        ->get();
                    if ($students->isNotEmpty())
                        return back()->with('searched_students', $students)->withInput();

                    //Порядок фамилия,имя
                    $students = Student::where('name', 'like', $exploded_str[1])
                        ->where('surname', 'like', $exploded_str[0])
                        ->get();
                    if ($students->isNotEmpty())
                        return back()->with('searched_students', $students)->withInput();


                }

                //Не нашли таким образом
                    return back()->with('not_found', 1)->withInput();

            }

        }

        /*$students_with_surname = Student::where('surname','like',$search_str)->get();

        if(isset($students_with_surname)) return $this->getStudents($students_with_surname);*/

    }



}
