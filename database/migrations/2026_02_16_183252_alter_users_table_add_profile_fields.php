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
    Schema::table('users', function (Blueprint $table) {

        $table->date('date_of_birth')->nullable()->after('email');
        $table->string('gender')->nullable()->after('date_of_birth');
        $table->string('phone')->nullable()->after('gender');

        $table->string('organization')->nullable()->after('phone');
        $table->string('designation')->nullable()->after('organization');

        $table->string('country')->nullable()->after('designation');
        $table->string('city')->nullable()->after('country');
        $table->text('address')->nullable()->after('city');

        $table->boolean('terms_accepted')->default(false)->after('status');
        $table->timestamp('terms_accepted_at')->nullable()->after('terms_accepted');
    });
}


    /**
     * Reverse the migrations.
     */
public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'date_of_birth',
            'gender',
            'phone',
            'organization',
            'designation',
            'country',
            'city',
            'address',
            'terms_accepted',
            'terms_accepted_at'
        ]);
    });
}

};
