<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAportasasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apor_tasas', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');

            $table->date('gest')->unique()->required();

            $table->double('apor_fr_a');
            $table->double('apor_sv_a');
            $table->double('apor_a');

            $table->double('apor_am_p');

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
        Schema::drop('apor_tasas');
    }
}
