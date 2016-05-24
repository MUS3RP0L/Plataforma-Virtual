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

            $table->string('ci')->required();

            $table->string('pat')->nullable();
            $table->string('mat')->nullable();
            $table->string('nom')->nullable();
            $table->string('nom2')->nullable();
            
            $table->date('fech_nac')->nullable();
            
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

        Schema::create('soli_types', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('fr_calificaciones', function(Blueprint $table){
            
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');

            $table->UnsignedBigInteger('afiliado_id');
            $table->UnsignedBigInteger('departamento_id')->nullable();

            $table->date('fech_emi');

            $table->date('fech_ini_pcot')->nullable();
            $table->date('fech_fin_pcot')->nullable();

            $table->double('total_cot');
            $table->double('total_cot_adi');
            $table->double('subtotal_fr');
            $table->double('rendimiento');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users'); 

            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
        });

        // Schema::create('sv_calificaciones', function(Blueprint $table){
            
        //     $table->engine = 'InnoDB';

        //     $table->bigIncrements('id');
        //     $table->UnsignedBigInteger('user_id');

        //     $table->UnsignedBigInteger('afiliado_id');
        //     $table->UnsignedBigInteger('departamento_id')->nullable();

        //     $table->date('fech_emi');

        //     $table->string('documento');

        //     $table->date('fech_ini_pcot')->nullable();
        //     $table->date('fech_fin_pcot')->nullable();

        //     $table->double('total_cot');
        //     $table->double('total_cot_adi');
        //     $table->double('subtotal_sv');

        //     $table->timestamps();
        //     $table->softDeletes();

        //     $table->foreign('user_id')->references('id')->on('users'); 

        //     $table->foreign('afiliado_id')->references('id')->on('afiliados');
        //     $table->foreign('departamento_id')->references('id')->on('departamentos');
        // });

        // Schema::create('beneficiarios', function (Blueprint $table)
        // {
        //     $table->engine = 'InnoDB';
            
        //     $table->bigIncrements('id');
        //     $table->UnsignedBigInteger('user_id');
        //     $table->UnsignedBigInteger('afiliado_id');
        //     $table->UnsignedBigInteger('soli_type');
        //     $table->UnsignedBigInteger('departamento_id');
        //     $table->UnsignedBigInteger('sv_calificacion_id');

        //     $table->string('ci')->required();

        //     $table->string('pat')->nullable();
        //     $table->string('mat')->nullable();
        //     $table->string('nom')->nullable();

        //     $table->string('paren')->nullable();

        //     $table->string('zona_domi')->nullable();
        //     $table->string('calle_domi')->nullable();
        //     $table->string('num_domi')->nullable();
        //     $table->string('tele_domi')->nullable();
        //     $table->string('celu_domi')->nullable();

        //     $table->string('zona_trab')->nullable();
        //     $table->string('calle_trab')->nullable();
        //     $table->string('num_trab')->nullable();

        //     $table->timestamps();
        //     $table->softDeletes();

        //     $table->foreign('user_id')->references('id')->on('users'); 
        //     $table->foreign('afiliado_id')->references('id')->on('afiliados');
        //     $table->foreign('soli_type')->references('id')->on('soli_types');
        //     $table->foreign('departamento_id')->references('id')->on('departamentos');
        //     $table->foreign('sv_calificacion_id')->references('id')->on('sv_calificaciones');
        // });
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
