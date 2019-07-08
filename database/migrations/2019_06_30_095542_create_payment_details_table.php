<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchant_id');
            $table->integer('payment_type_id');
            $table->integer('account_type_id');
            $table->integer('payment_provider_id');
            $table->string('mobile_account_number');
            $table->string('mobile_account_name');
            $table->string('bank_holder_name', 255);
            $table->string('bank_wallet_number', 255);
            $table->string('bank_branch_name', 255);
            $table->string('bank_routing_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_details');
    }
}
