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
        Schema::create('product_baskets', function (Blueprint $table) {
            $table->id();
            $table->date('fdate')->default(Carbon::now());
            $table->string('token')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->integer('fcount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_baskets');
    }
};
