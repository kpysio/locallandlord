<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trader_trade_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trader_id')->constrained()->onDelete('cascade');
            $table->foreignId('trade_category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trader_trade_category');
    }
};

