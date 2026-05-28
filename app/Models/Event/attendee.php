<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event\Checkin;

class Attendee extends Model
{
    protected $table = 'attendees';

    protected $fillable = [
        'attendee_id',
        'full_name',
        'organization',
        'phone',
        'email',
        'role',
        'qr_code',
        'is_duplicate',
        'registered_by'
    ];

    public function checkins()
    {
        return $this->hasMany(Checkin::class, 'attendee_id', 'attendee_id');
    }
}