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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('rating'); // 1-5
            $table->text('comment');
            $table->unsignedBigInteger('renter_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->timestamps();

            $table->foreign('renter_id')->references('id')->on('users');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
