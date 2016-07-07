<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('aporte_types', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name');
            
            $table->timestamps();

        }); 

        Schema::create('pago_types', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name');
            
            $table->timestamps();

        });

        Schema::create('aporte_pagos', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('afiliado_id');

            $table->date('fech_pago')->nullable();

            $table->string('codigo');
            
            $table->double('cot');
            $table->double('mus');
            $table->double('fr');
            $table->double('sv');
            $table->double('ipc');
            $table->double('total');
            $table->double('pagado');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('user_id')->references('id')->on('users'); 
        });

        Schema::create('aportes', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('afiliado_id');
            $table->UnsignedBigInteger('aporte_type_id');
            $table->UnsignedBigInteger('aporte_pago_id')->nullable();

            $table->UnsignedBigInteger('grado_id')->nullable();

            $table->date('gest')->required();

            $table->string('item')->nullable();
            
            $table->double('sue');
            $table->double('b_ant');
            $table->double('rent_dig');
            $table->double('b_est');
            $table->double('b_car');
            $table->double('b_fro');
            $table->double('b_ori');
            $table->double('b_seg')->nullable();

            $table->string('dfu')->nullable();
            $table->string('nat')->nullable();
            $table->string('lac')->nullable();
            $table->string('pre')->nullable();
            $table->double('sub')->nullable();

            $table->double('gan');
            $table->double('pag');

            $table->double('cot');
            $table->double('mus');
            $table->double('fr');
            $table->double('sv');

            $table->double('ipc')->nullable();
            $table->double('sub_mus')->nullable();;

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('aporte_type_id')->references('id')->on('aporte_types');
            $table->foreign('aporte_pago_id')->references('id')->on('aporte_pagos');

            $table->foreign('grado_id')->references('id')->on('grados');

            $table->unique(array('afiliado_id','gest'));

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aportes');
    }
}
