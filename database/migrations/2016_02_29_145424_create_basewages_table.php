<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseWagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('base_wages', function(Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('degree_id');
            $table->date('gest')->required();
            $table->double('sue');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('degrees_id')->references('id')->on('degrees');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sueldos');
    }
}
