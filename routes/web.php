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


Route::group(['prefix' => '/student'],function (){

    Route::get('/', 'StudentController@showStudentInfo')->name('home')->middleware('auth');

    Route::get('/teacher', 'StudentTeacherController@showTeacherInfo')->middleware('auth');

    Route::get('/lessons', 'LessonsController@showLessonsInfo')->middleware('auth');

    Route::get('/payments','PaymentController@showStudentPayments')->middleware('auth');


    Route::get('/buylessons', function () {
        return view('buylessons');
    })->middleware('auth');

    Route::get('/freelessons', function () {
        return view('freelessons');
    })->middleware('auth');

    Route::get('/writetoadmin', function () {
        return view('writetoadmin');
    })->middleware('auth');


    Route::get('/changepassword', function (Request $request) {
        $message = $request->session()->get('message',false);
        if($message) return view('changePassword')->with('message',$message);
        return view('changePassword');
    })->middleware('auth')->name('changePassword');

    /*Route::post('/changepassword','Auth\LoginController@changePassword')->name('toChangePassword');*/


    Route::post('/changepassword','StudentController@changePassword')->name('toChangePassword');

});


Route::get('/',function (){

    $role_name = mb_strtolower(Auth::user()->role->role_name);
        return redirect('/'.$role_name);

})->middleware('auth');

$this->get('/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/login', 'Auth\LoginController@login');
$this->post('student/logout', 'Auth\LoginController@logout')->name('logout');



