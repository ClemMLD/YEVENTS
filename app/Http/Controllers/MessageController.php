<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        return Message::create($request->all());
    }

    public function index()
    {
        return Message::all();
    }

    public function show($id)
    {
        return Message::find($id);
    }

    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->update($request->all());

        return $message;
    }

    public function delete(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return 204;
    }

    public function messagesFromUser($id)
    {
        return Message::where('user_id', $id)->get();
    }

    public function messagesFromEvent($id)
    {
        return Message::where('event_id', $id)->get();
    }
}
