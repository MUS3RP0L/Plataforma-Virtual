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
            $table->enum('est_civ', ['C', 'S'])->nullable();
            $table->enum('sex', ['M', 'F'])->nullable();
            $table->string('matri')->nullable();
            $table->date('fech_nac')->nullable();
            $table->date('fech_ing')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
