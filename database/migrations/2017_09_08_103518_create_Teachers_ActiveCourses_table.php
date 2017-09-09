<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersActiveCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Teachers_ActiveCourses', function (Blueprint $table) {
            $table->integer('active_course_id');
            //$table->foreign('active_course_id')->references('id')->on('Active_Courses');

            $table->integer('teacher_id');
            //$table->foreign('teacher_id')->references('id')->on('Teachers');
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
        Schema::dropIfExists('Teachers_ActiveCourses');
    }
}
