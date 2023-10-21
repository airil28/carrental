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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('payment_receipt');
            $table->boolean('payment_received')->default(false);
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
        Schema::dropIfExists('reservations');
    }
};
