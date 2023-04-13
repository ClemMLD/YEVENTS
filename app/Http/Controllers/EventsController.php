<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function allEvents()
    {
        return Event::all();
    }

    public function eventsFromType($type)
    {
        return Event::where('type', $type)->get();
    }

    public function eventsToday()
    {
        return Event::whereDate('date', date('Y-m-d'))->get();
    }

    public function mostLikedEvents() // Add likes in migration first
    {
        return Event::orderBy('likes', 'desc')->get();
    }

    public function createEvent(Request $request)
    {
        if (!auth()->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Event::create([
            'name' => $request->name,
            'type' => $request->type,
            'date' => $request->date,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);

        return response()->json(['success' => 'Event created successfully'], 200);
    }
}
