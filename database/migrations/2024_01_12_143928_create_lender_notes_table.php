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
        Schema::create('lender_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->date('date');
            $table->string('user_name')->nullable();
            $table->string('money_lended')->nullable();
            $table->decimal('interest',10,2)->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('lender_notes');
    }
};
