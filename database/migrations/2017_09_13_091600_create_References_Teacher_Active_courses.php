<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTeacherActiveCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('Teachers_ActiveCourses', function($table)
        {
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
        Schema::table('Teachers_ActiveCourses', function($table)
        {
            $table->dropForeign('active_course_id');
            $table->dropForeign('teacher_id');
        });
    }
}
