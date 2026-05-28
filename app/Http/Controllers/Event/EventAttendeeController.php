<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event\Attendee;

class EventAttendeeController extends Controller
{
    public function index()
    {
        $attendees = Attendee::latest()->get();

        return view('event.admin.attendees', compact('attendees'));
    }
}