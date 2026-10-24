<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->time('event_time')
                ->nullable()
                ->change();
        });
    }

    /**
     * Batalkan migration.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dateTime('event_time')
                ->nullable()
                ->change();
        });
    }
};