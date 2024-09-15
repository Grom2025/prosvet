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
        Schema::create('cicleDates', function (Blueprint $table) {
            $table->id();
            $table->date('fdate');
            $table->boolean('f0')->default('0');
            $table->boolean('f1')->default('0');
            $table->boolean('f2')->default('0');
            $table->boolean('f3')->default('0');
            $table->boolean('f4')->default('0');
            $table->boolean('f5')->default('0');
            $table->boolean('f6')->default('0');
            $table->boolean('f7')->default('0');
            $table->boolean('f8')->default('0');
            $table->boolean('f9')->default('0');
            $table->boolean('f10')->default('0');
            $table->boolean('f11')->default('0');
            $table->boolean('f12')->default('0');
            $table->boolean('f13')->default('0');
            $table->boolean('f14')->default('0');
            $table->boolean('f15')->default('0');
            $table->boolean('f16')->default('0');
            $table->boolean('f17')->default('0');
            $table->boolean('f18')->default('0');
            $table->boolean('f19')->default('0');
            $table->boolean('f20')->default('0');
            $table->boolean('f21')->default('0');
            $table->boolean('f22')->default('0');
            $table->boolean('f23')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cicleDates');
    }
};
