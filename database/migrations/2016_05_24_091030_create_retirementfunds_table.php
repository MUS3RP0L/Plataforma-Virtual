<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetirementFundsTable extends Migration
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
            $table->date('reception_date')->nullable();
            $table->date('check_file_date')->nullable();
            $table->date('qualification_date')->nullable();
            $table->date('legal_assessment_date')->nullable();
            $table->date('anticipation_start_date')->nullable();
            $table->date('anticipation_end_date')->nullable();
            $table->date('recognized_start_date')->nullable();
            $table->date('recognized_end_date')->nullable();
            $table->double('total_quotable');
            $table->double('total_additional_quotable');
            $table->double('subtotal');
            $table->double('performance');
            $table->double('total');
            $table->string('comment');
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
            $table->string('comment')->nullable();
            $table->timestamps();
            $table->foreign('requirement_id')->references('id')->on('requirements');        
            $table->foreign('retirement_fund_id')->references('id')->on('retirement_funds'); 

        });

        Schema::create('antecedent_files', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('shortened');

        });

        Schema::create('antecedents', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('antecedent_file_id');
            $table->UnsignedBigInteger('retirement_fund_id');
            $table->boolean('status')->default(0);
            $table->date('reception_date')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
            $table->foreign('antecedent_file_id')->references('id')->on('antecedent_files');      
            $table->foreign('retirement_fund_id')->references('id')->on('retirement_funds');    

        });

        Schema::create('applicant_types', function(Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');

        });

        Schema::create('applicants', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->UnsignedBigInteger('retirement_fund_id');
            $table->UnsignedBigInteger('applicant_type_id');
            $table->string('identity_card')->required();
            $table->string('last_name')->nullable();
            $table->string('mothers_last_name')->nullable();
            $table->string('name')->nullable();
            $table->string('kinship')->nullable();
            $table->string('home_address')->nullable();
            $table->string('home_phone_number')->nullable();
            $table->string('home_cell_phone_number')->nullable();
            $table->string('work_address')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('retirement_fund_id')->references('id')->on('retirement_funds');        
            $table->foreign('soli_type_id')->references('id')->on('applicant_types');        

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('retirement_fund_modalities');
        Schema::drop('retirement_funds');
        Schema::drop('requirements');
        Schema::drop('documents');
        Schema::drop('antecedent_files');
        Schema::drop('antecedents');
        Schema::drop('applicant_types');
        Schema::drop('applicants');
    }
}
