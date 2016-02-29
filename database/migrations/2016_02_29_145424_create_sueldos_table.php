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

            $table->integer('grado_id')->unsigned();

            $table->string('anio')->required();

            $table->string('sue');
       
            $table->timestamps();

            $table->foreign('grado_id')->references('id')->on('grados');

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
