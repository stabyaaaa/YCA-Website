<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event\Attendee;

class EventRegistrationController extends Controller
{
    public function index()
    {
        return view('event.register');
    }

    public function badge($id)
    {
        $attendee = Attendee::findOrFail($id);

        return view('event.badge', compact('attendee'));
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'full_name' => 'required',
                'phone' => 'required'
            ]);

            $duplicate = Attendee::where('full_name', $request->full_name)
                ->where('phone', $request->phone)
                ->exists();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Duplicate attendee found.'
                ], 422);
            }

            $nextId = (Attendee::max('id') ?? 0) + 1;

            $attendeeCode = 'WEP2026-' . str_pad($nextId, 6, '0', STR_PAD_LEFT);

            $attendee = Attendee::create([
                'attendee_id' => $attendeeCode,
                'full_name' => $request->full_name,
                'organization' => $request->organization,
                'phone' => $request->phone,
                'email' => $request->email,
                'role' => $request->role,
                'qr_code' => 'WEP2026|' . $attendeeCode,
                'registered_by' => auth()->id(),
                'is_duplicate' => 0
            ]);

            return response()->json([
                'success' => true,
                'attendee' => $attendee
            ]);

        } catch (\Throwable $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}