<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendeesController extends Controller
{
    public function store(Request $request)
    {
        $attendees = Attendee::where('event_id', $request->event_id)->join('users', 'attendees.user_id', '=', 'users.id')->select('users.nickname')->get();

        if (!$attendees->contains('nickname', Auth::user()->nickname)) {
            Attendee::create([
                'event_id' => $request->event_id,
                'user_id' => $request->user_id,
            ]);
        }

        return $attendees;
    }
}
