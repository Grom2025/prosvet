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
        Schema::create('rental_baskets', function (Blueprint $table) {
            $table->id();
            $table->string('token')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('rental_id')->nullable();
            $table->integer('fcount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_baskets');
    }
};
