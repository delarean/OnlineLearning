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


Route::group(['prefix' => '/student'],function (){

    Route::get('/', 'StudentController@showStudentInfo')->name('home')->middleware('auth');

    Route::get('/teacher', function () {
        return view('teacher');
    })->middleware('auth');

    Route::get('/lessons', function () {
        return view('lessons');
    })->middleware('auth');

    Route::get('/payments', function () {
        return view('payments');
    })->middleware('auth');

    Route::get('/buylessons', function () {
        return view('buylessons');
    })->middleware('auth');

    Route::get('/freelessons', function () {
        return view('freelessons');
    })->middleware('auth');

    Route::get('/writetoadmin', function () {
        return view('writetoadmin');
    })->middleware('auth');

});

Route::get('/',function (){

    $role_name = mb_strtolower(Auth::user()->role->role_name);
        return redirect('/'.$role_name);

})->middleware('auth');

$this->get('/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/login', 'Auth\LoginController@login');
$this->post('/logout', 'Auth\LoginController@logout')->name('logout');



