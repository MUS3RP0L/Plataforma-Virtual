<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('voucher_types', function(Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();

        });

        Schema::create('vouchers', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('affiliate_id');
            $table->UnsignedBigInteger('voucher_type_id');
            $table->UnsignedBigInteger('contribution_type_id')->nullable();
            $table->string('code');
            $table->string('concept');
            $table->double('total');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('affiliate_id')->references('id')->on('affiliates');
            $table->foreign('voucher_type_id')->references('id')->on('voucher_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('voucher_types');
        Schema::drop('vouchers');
    }
}
