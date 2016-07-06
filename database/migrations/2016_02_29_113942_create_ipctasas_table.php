<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpctasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('ipc_rates', function(Blueprint $table){

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->date('month_year')->unique()->required();
            $table->double('index');
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
        Schema::drop('ipc_rates');
    }
}
