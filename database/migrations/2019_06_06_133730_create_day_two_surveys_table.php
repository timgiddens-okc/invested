<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayTwoSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_two_surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->text('q1')->nullable();
            $table->text('q2')->nullable();
            $table->text('q3')->nullable();
            $table->text('q4')->nullable();
            $table->text('q5')->nullable();
            $table->text('q6')->nullable();
            $table->text('q7')->nullable();
            $table->text('q8')->nullable();
            $table->text('q9')->nullable();
            $table->text('q10')->nullable();
            $table->text('q11')->nullable();
            $table->text('q12')->nullable();
            $table->text('q13')->nullable();
            $table->text('q14')->nullable();
            $table->text('q15')->nullable();
            $table->text('q16')->nullable();
            $table->text('q17')->nullable();
            $table->text('q18')->nullable();
            $table->text('q19')->nullable();
            $table->text('comments1')->nullable();
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
        Schema::dropIfExists('day_two_surveys');
    }
}
