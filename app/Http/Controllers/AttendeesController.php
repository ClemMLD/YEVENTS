<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendeesController extends Controller
{
    public function store(Request $request)
    {
        if (Attendee::where('event_id', $request->event_id)->where('user_id', $request->user_id)->exists()) {
            return response()->json([
                'message' => 'You are already subscribed to this event',
            ], 400);
        }

        Attendee::create([
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
        ]);

        return response()->json([
            'message' => 'You have successfully subscribed to this event',
        ], 200);
    }

    public function show(Request $request)
    {
        $attendees = Attendee::where('event_id', $request->event_id)->get();

        return response()->json([
            'attendees' => $attendees,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $attendee = Attendee::where('event_id', $request->event_id)->where('user_id', $request->user_id)->first();

        if (!$attendee) {
            return response()->json([
                'message' => 'You are not subscribed to this event',
            ], 400);
        }

        $attendee->delete();

        return response()->json([
            'message' => 'You have successfully unsubscribed to this event',
        ], 200);
    }
}
