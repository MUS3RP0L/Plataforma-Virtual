<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributionRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contribution_rates', function(Blueprint $table){

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->date('month_year')->unique()->required();
            $table->double('retirement_fund');
            $table->double('life_insurance');
            $table->double('rate_active');
            $table->double('rate_passive');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users'); 
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contribution_rates');
    }
}
