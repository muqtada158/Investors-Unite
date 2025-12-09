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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('device_token')->nullable();
            $table->string('email_for_notification')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_for_notification')->nullable();
            $table->string('company')->nullable();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->comment('1 = buyers, 2 = seller, 3 = property dealer')->default(1);
            $table->tinyInteger('profile_status')->comment('0 = not completed, 1 = completed')->default(0);
            $table->tinyInteger('status')->comment('0 = inactive, 1 = active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('members');
    }
};
