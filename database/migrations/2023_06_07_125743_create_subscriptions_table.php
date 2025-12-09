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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->date('subscription_start_date')->nullable();
            $table->date('subscription_expire_date')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('billing_email')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_zipcode')->nullable();
            $table->boolean('auto_renew')->default(0)->comment('0 = no, 1 = yes');
            $table->boolean('status')->default(0)->comment('0 = InActive, 1 = Active');
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
        Schema::dropIfExists('subscriptions');
    }
};
