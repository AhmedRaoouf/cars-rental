<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('car_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('car_id')->constrained('cars');
            $table->enum('deliver',['yes', 'no'])->default('no');
            $table->string('purpose');
            $table->string('location')->nullable();
            $table->string('license_number')->nullable();
            $table->string('license_image')->nullable();
            $table->date('inssurance_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('country')->nullable();
            $table->string('driver_license_image')->nullable();
            $table->string('card_number')->nullable();
            $table->string('personal_identity_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_user');
    }
};
