<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    // Create Event
    public function store(Request $request)
    {
        // Save the image to the public folder under the path public/images
        $event = Event::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'campus' => $request->campus,
            'location' => $request->location,
            'date' => $request->date,
            'likes' => 0,
        ]);
        $request->image->move(public_path('images/events'), $event->id . '.jpg');

        return redirect()->route('events');
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
        $events = Event::orderBy('likes', 'desc')->take(3)->get();
        return view('home/home', ['events' => $events]);
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
        if (Auth::guest()) {
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

    public function eventsPage(Request $request)
    {
        if ($request->type) {
            $events = Event::where('type', $request->type)->get();
            return view('events/events', ['events' => $events]);
        }
        if ($request->campus) {
            $events = Event::where('campus', $request->campus)->get();
            return view('events/events', ['events' => $events]);
        }
        $events = Event::all();
        return view('events/events', ['events' => $events]);
    }

    public function createEventPage()
    {
        return view('events/create_event');
    }

    public function detailEventPage($id = null)
    {
        $event = Event::where('id', $id)->firstOrFail();
        $attendees = Event::where('events.id', $id)
            ->join('attendees', 'events.id', '=', 'attendees.event_id')
            ->join('users', 'attendees.user_id', '=', 'users.id')
            ->select('users.*')
            ->get();
        $likes = Event::where('id', $id)->first()->likes;
        return view('events/event_details', ['event' => $event, 'attendees' => $attendees, 'likes' => $likes]);
    }

    public function likeEvent(Request $request)
    {
        if (Cache::has('like:' . Auth::id() . ':' . $request->event_id)) {
            return response('Already liked', 403);
        }
        Cache::put('like:' . Auth::id() . ':' . $request->event_id, true, 60 * 24 * 7);
        Event::where('id', $request->event_id)->increment('likes');

        return response('Liked', 200);
    }

    public function eventLikes($id)
    {
        return Event::where('id', $id)->first()->likes;
    }
}
