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
        Schema::create('j_v_partners', function (Blueprint $table) {
            $table->id();
            $table->integer('lister_id')->comment('Property Lister');
            $table->integer('property_id');
            $table->integer('member_id')->comment('JV Requester');
            $table->boolean('status')->default(0)->comment('0 = InActive , 1 = Active');
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
        Schema::dropIfExists('j_v_partners');
    }
};
