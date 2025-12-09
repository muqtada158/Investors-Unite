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
        Schema::create('money_lenders', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('years_of_lending')->nullable();
            $table->string('lending_min')->nullable();
            $table->string('lending_max')->nullable();
            $table->string('type_of_lending')->nullable();
            $table->string('interest_rate')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('money_lenders');
    }
};
