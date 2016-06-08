<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grados', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id');         
            $table->string('niv');
            $table->string('grad');
            $table->string('lit');
            $table->string('abre');
            
            $table->timestamps();
        });

        Schema::table('aportes', function (Blueprint $table) {

            $table->UnsignedBigInteger('grado_id')->nullable();
            $table->foreign('grado_id')->references('id')->on('grados');
        });

        Schema::table('afiliados', function (Blueprint $table) {
            
           $table->UnsignedBigInteger('grado_id')->nullable();
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
        Schema::drop('grados');
    }
}
