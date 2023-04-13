<?php

namespace App\Http\Controllers;

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

    
    
}
