<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommunityPostMedia extends Model
{
    protected $table = 'community_post_media';

    protected $fillable = [
        'community_post_id',
        'file_path',
        'file_name',
        'mime_type',
        'file_size',
        'sort_order',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(
            CommunityPost::class,
            'community_post_id'
        );
    }

    public function isImage(): bool
    {
        return str_starts_with(
            $this->mime_type ?? '',
            'image/'
        );
    }

    public function isPdf(): bool
    {
        return $this->mime_type === 'application/pdf';
    }
}