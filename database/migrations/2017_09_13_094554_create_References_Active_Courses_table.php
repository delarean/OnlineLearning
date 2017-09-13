<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesActiveCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Active_Courses', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('All_Courses');
            $table->foreign('student_id')->references('id')->on('Students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Teachers_ActiveCourses', function($table)
        {
            $table->dropForeign('active_course_id');
            $table->dropForeign('teacher_id');
        });
    }
}
