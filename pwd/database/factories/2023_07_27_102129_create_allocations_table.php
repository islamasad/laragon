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
        Schema::create('allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')
                  ->nullable()
                  ->references('id')
                  ->on('items')
                  ->nullOnDelete();
            $table->integer('quantity');
            $table->foreignId('location_id')
                  ->nullable()
                  ->references('id')
                  ->on('locations')
                  ->nullOnDelete();
            $table->foreignId('author_id')
                  ->nullable()
                  ->references('id')
                  ->on('users')
                  ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allocations');
    }
};
