<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company')->nullable();
            $table->string('ticker')->nullable();
            $table->string('industry')->nullable();
            $table->string('sector')->nullable();
            $table->string('products_services')->nullable();
            $table->text('history')->nullable();
            $table->string('fifty_two_week_range')->nullable();
            $table->string('six_month')->nullable();
            $table->string('one_year')->nullable();
            $table->string('two_year')->nullable();
            $table->string('five_year')->nullable();
            $table->string('source')->nullable();
            $table->text('key_points')->nullable();
            $table->string('employee')->nullable();
            $table->string('question_one')->nullable();
            $table->string('answer_one')->nullable();
            $table->string('question_two')->nullable();
            $table->string('answer_two')->nullable();
            $table->string('question_three')->nullable();
            $table->string('answer_three')->nullable();
            $table->integer('portfolio_id')->unsigned()->nullable();
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
        Schema::dropIfExists('companies');
    }
}
