<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('organization_role')->nullable();
            $table->string('topic')->nullable();
            $table->text('message');

            // workflow status
            $table->enum('status', ['unread', 'pending', 'contacted'])->default('unread');

            // admin who marked it as contacted
            $table->foreignId('contacted_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};