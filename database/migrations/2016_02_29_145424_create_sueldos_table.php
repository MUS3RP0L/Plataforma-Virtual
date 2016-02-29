<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSueldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sueldos', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('anio')->required();

            $table->string('grado_id')->required();
            $table->string('sue');

            $table->foreign('grado_id')->references('id')->on('grados');
       
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
        Schema::drop('sueldos');
    }
}
