<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
           
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->double('por');
            $table->integer('from');
            $table->integer('name');
            $table->integer('to');
            $table->timestamps();
        });

        Schema::table('afiliados', function (Blueprint $table) {

            $table->UnsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias');

        });

        Schema::table('aportes', function (Blueprint $table) {

            $table->UnsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')->references('id')->on('categorias');

        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categorias');
    }
}
