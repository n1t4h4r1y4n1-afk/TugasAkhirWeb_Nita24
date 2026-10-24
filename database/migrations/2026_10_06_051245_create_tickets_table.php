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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                  ->nullable()
                  ->constrained()
                  ->nullOnDelete();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('event_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('ticket_type_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('ticket_code')->unique();

            $table->string('qr_code')->nullable();

            $table->enum('status', [
                'active',
                'used',
                'cancelled'
            ])->default('active');

            $table->timestamp('checked_in_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};