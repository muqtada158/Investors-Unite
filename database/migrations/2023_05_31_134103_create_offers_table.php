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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->integer('buyer_id');
            $table->integer('property_id');
            $table->decimal('offer_price',16,2)->nullable();
            $table->decimal('earnest_deposit',16,2)->nullable();
            $table->date('closing_date')->nullable();

            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->boolean('type')->default(1)->comment('0 = buy_now, 1 = make_an_offer');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('offers');
    }
};
