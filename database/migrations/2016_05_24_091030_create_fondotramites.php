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
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('fondo_tramites', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id');   
            $table->UnsignedBigInteger('afiliado_id');
            $table->UnsignedBigInteger('modalidad_id');
      
            $table->string('name');
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->foreign('modalidad_id')->references('id')->on('modalidades');

        });

        Schema::create('requisitos', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id');         
            $table->string('name');
            
            $table->timestamps();
        });

        Schema::create('documentos', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id'); 
            $table->UnsignedBigInteger('requisito_id');
            $table->UnsignedBigInteger('fondo_tramite_id');

            $table->date('fech_pres');
            $table->enum('est_civ', ['P', 'O', 'R']);
            $table->string('obs')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fondo_tramite_id')->references('id')->on('fondo_tramites');        
            $table->foreign('requisito_id')->references('id')->on('requisitos');        

        });

        Schema::create('recepciones', function (Blueprint $table) {
        
            $table->engine = 'InnoDB';    
            
            $table->bigIncrements('id');  
            $table->UnsignedBigInteger('fondo_tramite_id');
       
            $table->string('destino_id');

            $table->date('fech_entrega');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fondo_tramite_id')->references('id')->on('fondo_tramites');        

        });

        Schema::create('solicitantes', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('fondo_tramite_id');

            $table->string('ci')->required();

            $table->string('pat')->nullable();
            $table->string('mat')->nullable();
            $table->string('nom')->nullable();

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

            $table->foreign('fondo_tramite_id')->references('id')->on('fondo_tramites');        
        });

        Schema::create('certificaciones', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('fondo_tramite_id');

            $table->date('fecha')->nullable();
            $table->timestamps();
            $table->softDeletes(); 

            $table->foreign('fondo_tramite_id')->references('id')->on('fondo_tramites');        
        });

        Schema::create('prest_types', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('sigla')->nullable();
            $table->timestamps();
            $table->softDeletes(); 

         });

        Schema::create('antecedentes', function (Blueprint $table)
        {
            $table->engine ='InnoDB';

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('certificacion_id');
            $table->UnsignedBigInteger('prest_type_id');

            $table->boolean('estado')->default(0);
            $table->date('fecha');
            $table->string('nro_comp');
            $table->timestamps();
            $table->softDeletes(); 

            $table->foreign('certificacion_id')->references('id')->on('certificaciones'); 
            $table->foreign('prest_type_id')->references('id')->on('prest_types');               
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
