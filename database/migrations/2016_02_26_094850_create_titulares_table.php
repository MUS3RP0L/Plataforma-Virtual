<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTitularesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulares', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->integer('afiliado_id')->unsigned();

            $table->string('ci')->unique()->required();

            $table->string('pat')->nullable();
            $table->string('mat')->nullable();
            $table->string('nom')->nullable();
            $table->string('nom2')->nullable();
            $table->string('ap_esp')->nullable();

            $table->enum('sex', ['M', 'F'])->nullable();

            $table->date('fech_nac')->nullable();

            $table->string('zona')->nullable();
            $table->string('calle')->nullable();
            $table->string('num_domi')->nullable();
            $table->string('tele')->nullable();
            $table->string('celu')->nullable();
            $table->string('email')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('afiliado_id')->references('id')->on('afiliados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('titulares');
    }
}
