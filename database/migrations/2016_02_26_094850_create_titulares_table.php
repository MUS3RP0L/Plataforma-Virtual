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
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('afiliado_id');

            $table->string('ci')->unique()->required();

            $table->string('pat')->nullable();
            $table->string('mat')->nullable();
            $table->string('nom')->nullable();
            $table->string('nom2')->nullable();

            $table->string('paren')->nullable();

            $table->string('zona_domi')->nullable();
            $table->string('calle_domi')->nullable();
            $table->string('num_domi')->nullable();
            $table->string('tele_domi')->nullable();
            $table->string('celu_domi')->nullable();

            $table->string('zona_trab')->nullable();
            $table->string('calle_trab')->nullable();
            $table->string('num_trab')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users'); 
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
