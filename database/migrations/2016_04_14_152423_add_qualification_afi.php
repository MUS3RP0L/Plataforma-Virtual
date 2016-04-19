<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQualificationAfi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desgloses', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id');         
            $table->integer('cod');
            $table->string('name')->nullable();
            
            $table->timestamps();
        });

        Schema::table('afiliados', function (Blueprint $table) {
            
            $table->UnsignedBigInteger('desglose_id')->nullable();

            $table->foreign('desglose_id')->references('id')->on('desgloses');

        });

        Schema::table('aportes', function (Blueprint $table) {
            
            $table->UnsignedBigInteger('desglose_id')->nullable();
            $table->foreign('desglose_id')->references('id')->on('desgloses');

        });

        Schema::create('conyuges', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('afiliado_id');

            $table->string('ci')->unique()->required();

            $table->string('pat')->nullable();
            $table->string('mat')->nullable();
            $table->string('nom')->nullable();

            $table->date('fech_dece')->nullable();
            $table->string('motivo_dece')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('afiliado_id')->references('id')->on('afiliados');

        });

        Schema::table('unidades', function (Blueprint $table) {
            
            $table->UnsignedBigInteger('desglose_id');

            $table->foreign('desglose_id')->references('id')->on('desgloses');

        });

        Schema::create('calificaciones', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');

            $table->UnsignedBigInteger('afiliado_id');
            $table->UnsignedBigInteger('conyuge_id');
            $table->UnsignedBigInteger('titular_id');
            $table->UnsignedBigInteger('departamento_id');

            $table->date('fech_emi');

            $table->date('fech_ini_apor')->nullable();
            $table->date('fech_fin_apor')->nullable();

            $table->date('fech_ini_serv')->nullable();
            $table->date('fech_fin_serv')->nullable();

            $table->date('fech_ini_anti')->nullable();
            $table->date('fech_fin_anti')->nullable();

            $table->date('fech_ini_reco')->nullable();
            $table->date('fech_fin_reco')->nullable();

            $table->date('fech_ini_pcot')->nullable();
            $table->date('fech_fin_pcot')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users'); 

            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('conyuge_id')->references('id')->on('conyuges');
            $table->foreign('titular_id')->references('id')->on('titulares');
            $table->foreign('departamento_id')->references('id')->on('departamentos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
