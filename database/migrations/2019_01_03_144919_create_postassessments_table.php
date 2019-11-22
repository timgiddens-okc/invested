<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostassessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postassessments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('q1')->nullable();
            $table->string('q2')->nullable();
            $table->string('q3')->nullable();
            $table->string('q4')->nullable();
            $table->string('q5')->nullable();
            $table->string('q6')->nullable();
            $table->string('q7')->nullable();
            $table->string('q8')->nullable();
            $table->string('q9')->nullable();
            $table->string('q10')->nullable();
            $table->string('q11')->nullable();
            $table->string('q12')->nullable();
            $table->string('q13')->nullable();
            $table->string('q14')->nullable();
            $table->string('q15')->nullable();
            $table->string('q16')->nullable();
            $table->string('q17')->nullable();
            $table->string('q18')->nullable();
            $table->string('q19')->nullable();
            $table->string('q20')->nullable();
            $table->string('q21')->nullable();
            $table->string('q22')->nullable();
            $table->string('grade')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('postassessments');
    }
}
