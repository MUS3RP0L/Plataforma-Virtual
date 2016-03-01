<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAportesMusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        Schema::create('apor_mus_types', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('name');
            $table->timestamps();

        });

        Schema::create('aportes_musers', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->integer('afiliado_id')->unsigned();
            $table->integer('apor_mus_type_id')->unsigned();

            $table->string('mes')->required();
            $table->string('anio')->required();

            $table->date('fech_apor')->nullable();

            $table->string('num_rec')->required();

            $table->double('mus')->required();

            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('apor_mus_type_id')->references('id')->on('apor_mus_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {       
        Schema::drop('apor_types');
        Schema::drop('aportes_musers');
       
    }
}
