<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCompanyInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('fifty_two_week_range');
            $table->dropColumn('six_month');
            $table->dropColumn('one_year');
            $table->dropColumn('two_year');
            $table->dropColumn('five_year');
            $table->dropColumn('history');
            $table->string('pe')->nullable();
            $table->string('earnings_per_share')->nullable();
            $table->string('market_cap')->nullable();
            $table->string('sales_growth')->nullable();
            $table->string('company_headquarters')->nullable();
            $table->string('year_company_founded')->nullable();
            $table->string('website')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            //
        });
    }
}
