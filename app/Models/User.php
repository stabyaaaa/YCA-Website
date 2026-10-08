<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'gender',
        'organization',
        'organization_id',
        'country',
        'role',
        'status',
        'terms_accepted',
        'terms_accepted_at',
        'google_id',
        'avatar',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'date_of_birth' => 'date',
            'terms_accepted' => 'boolean',
            'terms_accepted_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification);
    }

    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
    public function isPartner(): bool
    {
        return $this->role === 'partner';
    }

    public function isActive()
    {
        return $this->status === 'active';
    }
    
    public function PartnerOrganization(): BelongsTo
    {
        return $this->belongsTo(
            \App\Models\PartnerOrganization::class,
            'organization_id'
        );
    }

    public function communityPosts(): HasMany
    {
        return $this->hasMany(
            \App\Models\CommunityPost::class
        );
    }

    public function communityReactions(): HasMany
    {
        return $this->hasMany(
            \App\Models\CommunityPostReaction::class
        );
    }

    public function communityBookmarks(): HasMany
    {
        return $this->hasMany(
            \App\Models\CommunityPostBookmark::class
        );
    }



    public function isCommunityContributor(): bool
    {
        /*
        * TEMPORARY
        *
        * Admin accounts are acting as Partner accounts.
        *
        * Later:
        *
        * return $this->role === 'partner';
        */

        return $this->role === 'partner';
    }
}