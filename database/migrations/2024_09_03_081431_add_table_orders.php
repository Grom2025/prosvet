<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_rental_orders', function (Blueprint $table) {
            $table->id();
            $table->date('fdate')->nullable()->default(Carbon::Now());
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
        Schema::dropIfExists('user_rental_orders');
    }
};
