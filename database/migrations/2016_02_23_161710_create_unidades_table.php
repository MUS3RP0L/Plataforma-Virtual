<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id');         
            $table->string('ciu');
            $table->string('cod');
            $table->string('lit');
            $table->string('abre');
            
            $table->timestamps();
        });

        Schema::table('afiliados', function (Blueprint $table) {

            $table->UnsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidades');

        });

        Schema::table('aportes', function (Blueprint $table) {

            $table->UnsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidades');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('unidades');
    }
}
