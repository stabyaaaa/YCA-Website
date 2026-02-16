<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRequest extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'requested_by',
        'action_type',
        'payload',
        'status',
        'approved_by',
    ];

    // Tell Laravel payload is JSON
    protected $casts = [
        'payload' => 'array',
    ];
}
