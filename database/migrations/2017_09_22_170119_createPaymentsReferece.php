<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsReferece extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Payments',function (Blueprint $table){

            $table->integer('student_id')->unsigned()->nullable();

        });

        Schema::table('Payments',function (Blueprint $table){

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
        //
    }
}
