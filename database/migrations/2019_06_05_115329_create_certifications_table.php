<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string("buying_a_stock")->nullable();
            $table->string("careful_research")->nullable();
            $table->string("saving_and_investing")->nullable();
            $table->string("diversify_and_reduce_risk")->nullable();
            $table->string("questions")->nullable();
            $table->string("grade")->nullable();
            $table->integer("user_id")->unsigned()->nullable();
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
        Schema::dropIfExists('certifications');
    }
}
