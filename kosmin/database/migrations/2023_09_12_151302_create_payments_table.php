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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('firstGuest_id')
                  ->nullable()
                  ->references('id')
                  ->on('guests')
                  ->nullOnDelete();
            $table->foreignId('secondGuest_id')
                  ->nullable()
                  ->references('id')
                  ->on('guests')
                  ->nullOnDelete();
            $table->foreignId('room_id')
                  ->nullable()
                  ->references('id')
                  ->on('rooms')
                  ->nullOnDelete();
            $table->date('paid_date');
            $table->integer('amount');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
