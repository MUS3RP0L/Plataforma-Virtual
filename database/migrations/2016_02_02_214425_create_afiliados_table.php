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
            $table->string('ci')->nullable();
            $table->string('pat')->nullable();
            $table->string('mat')->nullable();
            $table->string('nom')->nullable();
            $table->string('nom2')->nullable();
            $table->string('ap_esp')->nullable();
            $table->string('est_civ')->nullable();
            $table->string('sex')->nullable();
            $table->string('matri')->nullable();
            $table->string('fech_nac')->nullable();
            $table->date('fech_ing')->nullable();
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
