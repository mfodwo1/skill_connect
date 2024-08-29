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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->text('bio')->nullable();
            $table->text('skills')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->float('rating')->default(0);
            $table->boolean('verified')->default(false);
            $table->boolean('availability')->default(true);
            $table->float('latitude' )->nullable();
            $table->float('longitude' )->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
