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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained('services');
            $table->foreignId('seeker_id')->constrained('users')->on('id');
            $table->foreignId('provider_id')->constrained('providers');
            $table->dateTime('booking_date');
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled']);
            $table->enum('payment_status', ['pending', 'paid', 'failed']);
            $table->decimal('total_amount', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
