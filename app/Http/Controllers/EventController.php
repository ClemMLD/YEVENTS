<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Create Event
    public function store(Request $request)
    {
        return Event::create($request->all());
    }

    // Get single event
    public function show($id)
    {
        return Event::find($id);
    }

    // Update event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return $event;
    }

    // Get all events
    public function index()
    {
        return Event::all();
    }

    // Delete event
    public function delete(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return 204;
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

    public function eventAttendees($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        return array_map(function ($id) {
            return User::find($id)->nickname;
        }, json_decode($event->attendees));
    }

    public function subscribeToEvent($id)
    {
        if (!auth()->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $event = Event::where('id', $id)->first();
        Event::where('id', $id)->update([
            'attendees' => json_encode(array_merge(json_decode($event->attendees), [auth()->user()->id])),
        ]);

        return response()->json(['success' => 'You are now subscribed to this event'], 200);
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

    public function eventsPage()
    {
        $events = Event::all();
        return view('events', ['events' => $events]);
    }
}
