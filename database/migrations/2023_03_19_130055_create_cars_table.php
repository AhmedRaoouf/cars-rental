<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('title');
            $table->string('make');
            $table->string('model');
            $table->year('year');
            $table->integer('number_of_seats');
            $table->integer('number_of_doors');
            $table->string('fuel_type');
            $table->string('transmission');
            $table->string('mileage');
            $table->string('color');
            $table->string('car_type');
            $table->text('description')->nullable();
            $table->integer('distance');
            $table->enum('deliver',['yes', 'no'])->default('no');
            $table->string('location')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('plate_number')->nullable();
            $table->date('license_expiration_date')->nullable();
            $table->string('license_image')->nullable();
            $table->decimal('inssurance_yearly_cost',10,2)->nullable();
            $table->decimal('issurance_excess_value',10,2)->nullable();
            $table->string('inssurance_image')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('personal_identity_image')->nullable();
            $table->enum('plan',['Short Term', 'Long Term', 'Click n Own'])->nullable();
            $table->enum('driver',['With', 'Without'])->nullable();
            $table->integer('duration')->nullable();
            $table->decimal('market_value',10,2)->nullable();
            $table->decimal('daily_price',10,2)->nullable();
            $table->decimal('total_price',10,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
