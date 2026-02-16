<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('admin_requests', function (Blueprint $table) {
            $table->id();

            // Admin who made the request
            $table->foreignId('requested_by')->constrained('users')->onDelete('cascade');

            // Type of action requested
            // example: create_admin
            $table->string('action_type');

            // Store extra data (email, name, etc.)
            $table->json('payload');

            // pending | approved | rejected
            $table->string('status')->default('pending');

            // Super admin who approved/rejected
            $table->foreignId('approved_by')->nullable()->constrained('users');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_requests');
    }
};
