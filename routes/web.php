<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

