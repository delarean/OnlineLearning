<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAllTablesKeysLength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Active_Courses',function (Blueprint $table){

            $table->increments('id',255)->change();
            //$table->integer('course_id',255)->change();
            //$table->integer('student_id',255)->change();

        });

        Schema::table('All_Courses',function (Blueprint $table){

            $table->increments('id',255)->change();
            //$table->bigInteger('cost',500)->change();
        });

        Schema::table('Lessons',function (Blueprint $table){

            $table->increments('id',255)->change();
            //$table->integer('active_course_id',255)->change();
            //$table->integer('teacher_id',255)->change();

        });

        Schema::table('Roles',function (Blueprint $table){

            $table->increments('id',255)->change();

        });

        Schema::table('Students',function (Blueprint $table){

            $table->increments('id',255)->change();
            //$table->integer('user_id',255)->change();
            //$table->bigInteger('budget',500)->change();

        });

        Schema::table('Teachers',function (Blueprint $table){

            $table->increments('id',255)->change();
            //$table->integer('user_id',255)->change();

        });

        Schema::table('Users',function (Blueprint $table){

            $table->increments('id',255)->change();
            //$table->integer('role_id',255)->change();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
