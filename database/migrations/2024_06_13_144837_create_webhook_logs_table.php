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
        Schema::create('webhook_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('stripe_customer')->nullable();
            $table->string('stripe_customer_email')->nullable();
            $table->string('stripe_invoice')->nullable();
            $table->string('stripe_billing_reason')->nullable();
            $table->text('stripe_hosted_invoice_url')->nullable();
            $table->text('stripe_invoice_pdf')->nullable();
            $table->text('stripe_event')->nullable();
            $table->text('stripe_complete_object')->nullable();
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
        Schema::dropIfExists('webhook_logs');
    }
};
