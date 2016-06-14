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
        Schema::create('modalidades', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('abre');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('fondo_tramites', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id');   
            $table->UnsignedBigInteger('afiliado_id');
            $table->UnsignedBigInteger('modalidad_id')->nullable();
            $table->UnsignedBigInteger('departamento_id')->nullable();

            $table->string('codigo');

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

            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('modalidad_id')->references('id')->on('modalidades');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
        });

        Schema::create('requisitos', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id'); 
            $table->UnsignedBigInteger('modalidad_id');        
            $table->text('name');
            
            $table->timestamps();

            $table->foreign('modalidad_id')->references('id')->on('modalidades');
        });

        Schema::create('documentos', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id'); 
            $table->UnsignedBigInteger('requisito_id');
            $table->UnsignedBigInteger('fondo_tramite_id');

            $table->date('fech_pres');
            $table->boolean('est')->default(0);
            $table->string('obs')->nullable();

            $table->timestamps();

            $table->foreign('requisito_id')->references('id')->on('requisitos');        
            $table->foreign('fondo_tramite_id')->references('id')->on('fondo_tramites');        
        });

        Schema::create('prestaciones', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->string('sigla')->nullable();
            $table->timestamps();
         });

        Schema::create('antecedentes', function (Blueprint $table)
        {
            $table->engine ='InnoDB';

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

        Schema::create('soli_types', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('solicitantes', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('fondo_tramite_id');
            $table->UnsignedBigInteger('soli_type_id');

            $table->string('ci')->required();

            $table->string('pat')->nullable();
            $table->string('mat')->nullable();
            $table->string('nom')->nullable();

            $table->string('paren')->nullable();

            $table->string('direc_domi')->nullable();
            $table->string('celu_domi')->nullable();

            $table->string('direc_trab')->nullable();
            $table->string('tele_trab')->nullable();

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
