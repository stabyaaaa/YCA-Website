<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event\Attendee;

class EventPrintController extends Controller
{
    public function printBadge($id)
    {
        $attendee = Attendee::findOrFail($id);

        return view('event.print-badge', compact('attendee'));
    }

    // OPTIONAL: for kiosk auto printing queue
    public function nextQueue()
    {
        $attendee = Attendee::where('is_printed', 0)
            ->orderBy('id', 'asc')
            ->first();

        if (!$attendee) {
            return response()->json([
                'success' => false,
                'message' => 'No pending print'
            ]);
        }

        return response()->json([
            'success' => true,
            'attendee' => $attendee
        ]);
    }
}