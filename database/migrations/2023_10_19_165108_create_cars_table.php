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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->json('car_images')->nullable();
            $table->string('car_name');
            $table->string('car_image')->nullable();
            $table->decimal('day_rate', 8, 2);
            $table->integer('discount');
            $table->text('description')->nullable();
            $table->integer('bank_number');
            $table->string('bank_name');
            $table->string('address_pickup');
            $table->string('car_type');
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
