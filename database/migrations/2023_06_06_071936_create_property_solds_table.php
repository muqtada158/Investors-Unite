<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_solds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lister_id')->nullable();
            $table->bigInteger('buyer_id')->nullable();
            $table->bigInteger('offer_id')->nullable();
            $table->bigInteger('property_id')->nullable();
            $table->decimal('buying_price',16,2)->nullable();
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
        Schema::dropIfExists('property_solds');
    }
};
