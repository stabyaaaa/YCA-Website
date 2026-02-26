<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'city',
                'designation',
                'phone',
                'address'
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->string('designation')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
        });
    }
};
