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
            $table->string('merchant_name', 255)->nullable();
            $table->string('merchant_number', 255)->nullable();
            $table->string('merchant_email', 255)->nullable();
            $table->string('profile_image', 255)->nullable();
            $table->string('merchant_identification_type')->nullable();
            $table->string('merchant_identification_number')->nullable();
            $table->string('merchant_identification_image_1')->nullable();
            $table->string('merchant_identification_image_2')->nullable();
            $table->string('business_name', 255)->nullable();
            $table->string('media_link', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->boolean('acceptTermsAndCondition')->default(0);
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
