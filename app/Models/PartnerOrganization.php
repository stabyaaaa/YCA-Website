<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;



class PartnerOrganization extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'country',
        'website',
        'description',
        'is_verified',
        'is_active',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'organization_id');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(
            CommunityPost::class,
            'organization_id'
        );
    }
}