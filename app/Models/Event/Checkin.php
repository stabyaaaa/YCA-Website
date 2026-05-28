<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event\Attendee;

class Checkin extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'attendee_id',
        'day_number',
        'scanned_by',
        'checked_in_at'
    ];

    protected $dates = [
        'checked_in_at'
    ];

    public function attendee()
    {
        return $this->belongsTo(
            Attendee::class,
            'attendee_id',
            'attendee_id'
        );
    }
}