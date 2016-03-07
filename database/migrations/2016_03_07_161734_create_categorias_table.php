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
            $table->timestamps();
        });

        Schema::table('afiliados', function (Blueprint $table) {

            $table->UnsignedBigInteger('categoria_id');
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
