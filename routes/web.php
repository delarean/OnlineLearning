<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \Illuminate\Http\Request;


Route::group(['middleware' => 'auth','prefix' => '/student'],function (){

    Route::get('/', 'StudentController@showStudentInfo')->name('home');

    Route::get('/teacher', 'StudentTeacherController@showTeacherInfo')->name('teacher');

    Route::get('/lessons', 'LessonsController@showLessonsInfo');

    Route::get('/payments','PaymentController@showStudentPayments');


    Route::get('/buylessons', 'BuyLessonsController@showBuyLessons');

    Route::get('/freelessons','FreeLessonsController@showFreeLessons');

    Route::get('/writetoadmin', 'WriteToAdminController@show');


    Route::get('/changepassword','ChangePasswordController@show')->name('changePassword');


    Route::post('/changepassword','StudentController@changePassword')->name('toChangePassword');

});

Route::group(['middleware' => 'auth','prefix' => 'admin'],function (){

    Route::get('/','Admin\StudentsControler@show');

    Route::post('/','Admin\StudentsControler@addStudent')->name('student');

    Route::get('/teachers',function (){
        return view('admin.teachers');
    });

    Route::get('/paymentsout',function (){
        return view('admin.paymentsout');
    });

    Route::get('/lessons',function (){
        return view('admin.lessons');
    });

    Route::get('/payments',function (){
        return view('admin.payments');
    });



});

Route::group(['prefix' => 'teacher'],function (){

    Route::get('/',function (){
        return view('teacher.teacher');
    });

    Route::get('/students',function (){
        return view('teacher.students');
    });

    Route::get('/lessons',function (){
        return view('teacher.lessons');
    });

    Route::get('/paymentsout',function (){
        return view('teacher.paymentsout');
    });

    Route::get('/calendar',function (){
        return view('teacher.calendar');
    });

});


Route::get('/',function (){

    $role_name = mb_strtolower(Auth::user()->role->role_name);
        return redirect('/'.$role_name);

})->middleware('auth');

$this->get('/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/login', 'Auth\LoginController@login');
$this->post('student/logout', 'Auth\LoginController@logout')->name('logout');



