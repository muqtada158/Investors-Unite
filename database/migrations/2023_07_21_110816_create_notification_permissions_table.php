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
        Schema::create('notification_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->integer('email_deal_posted')->default(0);
            $table->integer('notify_deal_posted')->default(0);
            $table->integer('email_offer_received')->default(0);
            $table->integer('notify_offer_received')->default(0);
            $table->integer('email_buy_now')->default(0);
            $table->integer('notify_buy_now')->default(0);
            $table->integer('email_jv_partner')->default(0);
            $table->integer('notify_jv_partner')->default(0);
            $table->integer('email_direct_message')->default(0);
            $table->integer('notify_direct_message')->default(0);
            $table->integer('email_closing_date')->default(0);
            $table->integer('notify_closing_date')->default(0);
            $table->integer('email_financing')->default(0);
            $table->integer('notify_financing')->default(0);
            $table->integer('email_house_tour')->default(0);
            $table->integer('notify_house_tour')->default(0);
            $table->integer('email_price_reduction')->default(0);
            $table->integer('notify_price_reduction')->default(0);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('notification_permissions');
    }
};
