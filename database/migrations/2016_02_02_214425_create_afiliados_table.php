<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfiliadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliados', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->increments('id');         
            $table->string('ci');
            $table->string('pat');
            $table->string('mat');
            $table->string('nom');
            $table->string('nom2');
            $table->string('ap_esp');
            $table->string('est_civ');
            $table->string('sex');
            $table->string('matri');
            $table->string('fech_nac');
            $table->date('fech_ing');
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
        Schema::drop('afiliados');
    }
}
