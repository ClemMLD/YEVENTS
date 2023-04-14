<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing_page');
})->name('home');

Route::get('/events', [EventController::class, 'eventsPage'])->name('events');
Route::get('/create-event', [EventController::class, 'createEventPage'])->name('events.create');
Route::get('/event/{id}', [EventController::class, 'detailEventPage'])->name('events.show');
Route::get('/profile', [UserController::class, 'profilePage'])->name('profile');

Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');