<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferensesWithUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Students', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
        });

        Schema::table('Teachers', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
        });

        Schema::table('Teachers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users');
        });
        Schema::table('Students', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('Teachers', function($table)
        {
            $table->dropForeign('user_id');
        });

        Schema::table('Students', function($table)
        {
            $table->dropForeign('user_id');
        });

        Schema::dropIfExists('Students');
        Schema::dropIfExists('Teachers');
    }
}
