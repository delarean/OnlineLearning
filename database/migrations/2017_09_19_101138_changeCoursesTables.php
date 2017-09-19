<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCoursesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('Lessons', function (Blueprint $table) {
            $table->increments('id',255);
            $table->date('date');
            $table->time('time');
            $table->string('status',255);
            $table->integer('active_course_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('Lessons',function (Blueprint $table){
            $table->foreign('active_course_id')->references('id')->on('Active_Courses');
            $table->foreign('teacher_id')->references('id')->on('Teachers');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Lessons', function($table)
        {
            $table->dropForeign('active_course_id');
            $table->dropForeign('teacher_id');
        });

        Schema::dropIfExists('Lessons');
    }
}
