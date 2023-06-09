<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store(Request $request)
    {
        return User::create($request->all());
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'nickname' => $request->nickname,
            'email' => $request->email,
        ]);

        $user = User::where('id', $id)->first();

        return view('profile', ['user' => $user]);
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return 204;
    }

    public function userEvents($id)
    {
        return User::find($id)->events;
    }

    public function userMessages($id)
    {
        return User::find($id)->messages;
    }

    public function userLikedEvents($id)
    {
        return User::find($id)->likedEvents;
    }

    public function userSubscribedEvents($id)
    {
        return User::find($id)->subscribedEvents;
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('user', $user);
            return redirect('/');
        }

        return "Username or password is not correct";
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $request->session()->put('user', $user);
        return redirect('/');
    }

    public function profilePage()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('profile', ['user' => $user]);
    }
}
