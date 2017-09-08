<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActiveCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Active_Courses', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('course_id')->references('id')->on('All_Courses');
            $table->foreign('student_id')->references('id')->on('Students');
            $table->foreign('teacher_id')->references('id')->on('Teachers');
            $table->integer('amount_remain');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Active_Courses');
    }
}
