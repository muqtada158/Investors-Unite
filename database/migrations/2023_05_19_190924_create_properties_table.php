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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_type')->nullable();
            //address
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->text('complete_address')->nullable();

            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('after_repair_value', 10, 2)->nullable();
            $table->integer('no_of_beds')->nullable();
            $table->integer('no_of_baths')->nullable();
            $table->string('acceptable_financing')->nullable();
            $table->string('total_square_footage')->nullable();
            $table->string('association_community')->nullable();
            $table->string('current_zoning')->nullable();
            $table->decimal('annual_taxes', 10, 2)->nullable();
            $table->year('year_built')->nullable();
            $table->string('water_source')->nullable();
            $table->string('sewer_source')->nullable();
            $table->string('cooling_type')->nullable();
            $table->string('heating_type')->nullable();
            $table->string('type_of_parking')->nullable();
            $table->text('description')->nullable();
            $table->date('expected_closing_date')->nullable();
            $table->string('property_availability')->nullable();
            $table->integer('member_id')->nullable();
            //more features
            $table->string('bedroom_and_bathroom')->nullable();
            $table->string('basement')->nullable();
            $table->string('flooring')->nullable();
            $table->string('appliances')->nullable();
            $table->text('other_interior_features')->nullable();
            //neighbourhood
            $table->integer('walk_score')->nullable();
            $table->integer('transit_score')->nullable();
            $table->integer('bike_score')->nullable();
            $table->boolean('status')->default(1)->comment('0 = inactive, 1 = active');
            //property sold
            $table->integer('property_sold')->default(0)->comment('0 = notSold, 1 = sold');
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
        Schema::dropIfExists('properties');
    }
};
