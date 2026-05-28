<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('checkins', function (Blueprint $table) {

            $table->id();

            $table->foreignId('attendee_id')
                ->constrained('attendees')
                ->cascadeOnDelete();

            $table->integer('day_number');

            $table->foreignId('scanned_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('checked_in_at')
                ->useCurrent();

            $table->unique([
                'attendee_id',
                'day_number'
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checkins');
    }
};