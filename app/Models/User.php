<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
    'name',
    'email',
    'password',
    'date_of_birth',
    'gender',
    'organization',
    'country',
    'role',
    'status',
    'terms_accepted',
    'terms_accepted_at'
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

    // Role Checks
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

    // Status Check
    public function isActive()
    {
        return $this->status === 'active';
    }
}
