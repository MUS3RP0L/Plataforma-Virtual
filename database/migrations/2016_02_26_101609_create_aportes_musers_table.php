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

            $table->bigIncrements('id');
            $table->string('name');
            
            $table->timestamps();

        });

        Schema::create('pagos', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');

            $table->date('fech_pag')->nullable();

            $table->timestamps();

        });

        Schema::create('aportes_musers', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('afiliado_id');
            $table->UnsignedBigInteger('apor_mus_type_id');
            
            $table->UnsignedBigInteger('pago_id');

            $table->integer('mes')->required();
            $table->integer('anio')->required();

            $table->string('num_rec')->required();

            $table->double('mus')->required();

            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('apor_mus_type_id')->references('id')->on('apor_mus_types');
            $table->foreign('pago_id')->references('id')->on('pagos');

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
