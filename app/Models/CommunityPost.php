<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommunityPost extends Model
{
    protected $fillable = [

        'user_id',
        'organization_id',
        'category_id',

        'title',
        'body',

        'country',
        'wepower_pillar',

        'external_url',
        'video_url',

        'status',

        'admin_message',

        'reviewed_by',
        'reviewed_at',

        'submitted_at',
        'published_at',
        'scheduled_at',

        'is_featured',

        'views_count',
        'likes_count',
        'shares_count',
        'bookmarks_count',
    ];

    protected $casts = [

        'reviewed_at' => 'datetime',
        'submitted_at' => 'datetime',
        'published_at' => 'datetime',
        'scheduled_at' => 'datetime',

        'is_featured' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(
            PartnerOrganization::class,
            'organization_id'
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            CommunityCategory::class,
            'category_id'
        );
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'reviewed_by'
        );
    }

    public function media(): HasMany
    {
        return $this->hasMany(
            CommunityPostMedia::class
        )->orderBy('sort_order');
    }

    public function reactions(): HasMany
    {
        return $this->hasMany(
            CommunityPostReaction::class
        );
    }

    public function bookmarks(): HasMany
    {
        return $this->hasMany(
            CommunityPostBookmark::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function isEditable(): bool
    {
        return in_array($this->status, [
            'draft',
            'changes_requested',
            'rejected',
        ]);
    }

    public function isPublished(): bool
    {
        return $this->status === 'approved'
            && $this->published_at !== null
            && $this->published_at->lte(now());
    }

    public function hasLiked(?int $userId): bool
    {
        if (!$userId) {
            return false;
        }

        return $this->reactions()
            ->where('user_id', $userId)
            ->exists();
    }

    public function hasBookmarked(?int $userId): bool
    {
        if (!$userId) {
            return false;
        }

        return $this->bookmarks()
            ->where('user_id', $userId)
            ->exists();
    }
}