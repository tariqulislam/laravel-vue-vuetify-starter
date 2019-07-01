<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('merchant_name', 255);
            $table->string('merchant_number', 255);
            $table->string('merchant_email', 255);
            $table->string('profile_image', 255);
            $table->integer('merchant_identification_type_id');
            $table->string('merchant_identification_number');
            $table->string('merchant_identification_image_1');
            $table->string('merchant_identification_image_2');
            $table->string('business_name', 255);
            $table->string('media_link', 255);
            $table->string('address', 255);
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
        Schema::dropIfExists('merchants');
    }
}
