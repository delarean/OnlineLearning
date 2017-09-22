<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Payments', function (Blueprint $table) {
            $table->increments('id',255);
            $table->integer('course_id')->unsigned();
            $table->date('date');
            $table->bigInteger('amount');
            $table->timestamps();
        });

        Schema::table('Payments', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('All_Courses');
        });

        Schema::table('Students', function (Blueprint $table) {
            $table->integer('payment_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Payments', function (Blueprint $table) {
            $table->dropForeign('course_id');
        });

        Schema::dropIfExists('Payments');

        Schema::table('Students', function (Blueprint $table) {
            $table->dropColumn('payment_id');
        });
    }
}
