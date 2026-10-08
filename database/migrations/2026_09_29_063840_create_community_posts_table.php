<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('community_posts', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('organization_id')
                ->nullable()
                ->constrained('partner_organizations')
                ->nullOnDelete();

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('community_categories')
                ->nullOnDelete();

            $table->string('title');

            $table->longText('body');

            $table->string('country')->nullable();

            $table->string('wepower_pillar')->nullable();

            $table->string('external_url')->nullable();

            $table->string('video_url')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Post status
            |--------------------------------------------------------------------------
            |
            | draft
            | pending
            | changes_requested
            | approved
            | rejected
            |
            */

            $table->string('status')->default('draft')->index();

            /*
            |--------------------------------------------------------------------------
            | Admin moderation
            |--------------------------------------------------------------------------
            */

            $table->text('admin_message')->nullable();

            $table->foreignId('reviewed_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('reviewed_at')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Publication
            |--------------------------------------------------------------------------
            */

            $table->timestamp('submitted_at')->nullable();

            $table->timestamp('published_at')->nullable();

            $table->timestamp('scheduled_at')->nullable();

            $table->boolean('is_featured')->default(false);

            /*
            |--------------------------------------------------------------------------
            | Analytics
            |--------------------------------------------------------------------------
            */

            $table->unsignedBigInteger('views_count')->default(0);

            $table->unsignedBigInteger('likes_count')->default(0);

            $table->unsignedBigInteger('shares_count')->default(0);

            $table->unsignedBigInteger('bookmarks_count')->default(0);

            $table->timestamps();

            $table->index([
                'status',
                'published_at'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('community_posts');
    }
};