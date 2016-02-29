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

        Schema::create('apor_types', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('type');
            $table->timestamps();

        });

        Schema::create('aportes_musers', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->increments('id');
            
            $table->integer('afiliado_id')->unsigned();
            $table->integer('apor_type_id')->unsigned();

            $table->string('mes')->required();
            $table->string('anio')->required();

            $table->date('fech_apor')->nullable();

            $table->string('num_rec')->required();

            $table->double('mus')->required();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('apor_type_id')->references('id')->on('apor_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aportes_musers');
        Schema::drop('apor_types');
    }
}
