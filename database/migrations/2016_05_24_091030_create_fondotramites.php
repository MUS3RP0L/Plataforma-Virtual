<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFondotramites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retirement_fund_modalities', function(Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('shortened');

        });

        Schema::create('retirement_funds', function (Blueprint $table) {
                    
            $table->bigIncrements('id');   
            $table->UnsignedBigInteger('affiliate_id');
            $table->UnsignedBigInteger('retirement_fund_modality_id')->nullable();
            $table->UnsignedBigInteger('city_id')->nullable();
            $table->string('code');
            $table->date('fech_ven')->nullable();
            $table->date('fech_arc')->nullable();
            $table->date('fech_cal')->nullable();
            $table->date('fech_dic')->nullable();

            $table->date('fech_ini_anti')->nullable();
            $table->date('fech_fin_anti')->nullable();

            $table->date('fech_ini_reco')->nullable();
            $table->date('fech_fin_reco')->nullable();

            $table->double('total_cot');
            $table->double('total_cot_adi');
            $table->double('subtotal');
            $table->double('rendimiento');
            $table->string('obs');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('affiliate_id')->references('id')->on('affiliates');
            $table->foreign('retirement_fund_modality_id')->references('id')->on('retirement_fund_modalities');
            $table->foreign('city_id')->references('id')->on('cities');

        });

        Schema::create('requirements', function (Blueprint $table) {
                    
            $table->bigIncrements('id'); 
            $table->UnsignedBigInteger('retirement_fund_modality_id');        
            $table->string('name');
            $table->string('shortened');
            $table->foreign('retirement_fund_modality_id')->references('id')->on('retirement_fund_modalities');

        });

        Schema::create('documents', function (Blueprint $table) {
                    
            $table->bigIncrements('id'); 
            $table->UnsignedBigInteger('requirement_id');
            $table->UnsignedBigInteger('retirement_fund_id');
            $table->date('reception_date');
            $table->boolean('status')->default(0);
            $table->string('observation')->nullable();
            $table->timestamps();
            $table->foreign('requirement_id')->references('id')->on('requisitos');        
            $table->foreign('retirement_fund_id')->references('id')->on('retirement_funds'); 

        });

        Schema::create('prestaciones', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->string('sigla')->nullable();

        });

        Schema::create('antecedentes', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('prestacion_id');
            $table->UnsignedBigInteger('fondo_tramite_id');
            $table->boolean('est')->default(0);
            $table->date('fecha')->nullable();
            $table->string('nro_comp')->nullable();
            $table->timestamps();
            $table->foreign('prestacion_id')->references('id')->on('prestaciones');      
            $table->foreign('fondo_tramite_id')->references('id')->on('fondo_tramites');        
        });

        Schema::create('soli_types', function(Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');

        });

        Schema::create('solicitantes', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('fondo_tramite_id');
            $table->UnsignedBigInteger('soli_type_id');
            $table->string('ci')->required();
            $table->string('pat')->nullable();
            $table->string('mat')->nullable();
            $table->string('nom')->nullable();
            $table->string('paren')->nullable();
            $table->string('direc_domi')->nullable();
            $table->string('tele_domi')->nullable();
            $table->string('celu_domi')->nullable();
            $table->string('direc_trab')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('fondo_tramite_id')->references('id')->on('fondo_tramites');        
            $table->foreign('soli_type_id')->references('id')->on('soli_types');        

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
