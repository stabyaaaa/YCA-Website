<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ContactMessage extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'organization_role',
        'topic',
        'message',
        'status',
        'contacted_by',
    ];

    public function contactedBy()
    {
        return $this->belongsTo(User::class, 'contacted_by');
    }
}