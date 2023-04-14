<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validation = Validator::make($request->all(), [
            'nickname' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('id', $id)->first();

        if ($validation->fails()) {
            return view('authentication/account', ['user' => $user, 'error' => 'Informations incorrectes']);
        }

        User::where('id', $id)->update([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return view('authentication/account', ['user' => $user]);
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
            Auth::attempt($request->only('email', 'password'));
            return redirect('/');
        }

        return view('authentication/login', ['error' => 'Informations incorrectes']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'nickname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);


        if ($validation->fails()) {
            return view('authentication/register', ['error' => 'Informations incorrectes']);
        }

        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $request->session()->put('user', $user);
        return redirect('/');
    }

    public function loginPage()
    {
        if (auth()->user()) {
            return redirect('/');
        }
        return view('authentication/login');
    }

    public function registerPage()
    {
        if (auth()->user()) {
            return redirect('/');
        }
        return view('authentication/register');
    }

    public function profilePage()
    {
        if (!auth()->user()) {
            return redirect('/login-page');
        }
        $user = User::where('id', auth()->user()->id)->first();
        return view('authentication/account', ['user' => $user]);
    }
}
