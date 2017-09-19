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

    Route::get('/', function () {
        return view('profile');
    })->name('home');

    Route::get('/teacher', function () {
        return view('teacher');
    });

    Route::get('/lessons', function () {
        return view('lessons');
    });

    Route::get('/payments', function () {
        return view('payments');
    });

    Route::get('/buylessons', function () {
        return view('buylessons');
    });

    Route::get('/freelessons', function () {
        return view('freelessons');
    });

    Route::get('/writetoadmin', function () {
        return view('writetoadmin');
    });

});


$this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/', 'Auth\LoginController@login');
$this->post('/logout', 'Auth\LoginController@logout')->name('logout');

