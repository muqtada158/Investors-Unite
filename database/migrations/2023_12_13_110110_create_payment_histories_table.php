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
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('payment_type')->nullable();
            $table->string('stripe_transaction_id')->nullable();
            $table->string('stripe_amount')->nullable();
            $table->string('stripe_status')->nullable();
            $table->string('stripe_description')->nullable();
            $table->string('stripe_payment_method')->nullable();
            $table->text('stripe_receipt_url')->nullable();
            $table->string('status')->nullable()->comment('0 = Failed, 1 = Success');
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
        Schema::dropIfExists('payment_histories');
    }
};
