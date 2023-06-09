<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::put('/events/{id}', [EventController::class, 'update']);
Route::delete('/events/{id}', [EventController::class, 'delete']);
Route::get('/events/type/{type}', [EventController::class, 'eventsFromType']);
Route::get('/events/today', [EventController::class, 'eventsToday']);
Route::get('/events/most-liked', [EventController::class, 'mostLikedEvents']);
Route::get('/events/{id}/attendees', [EventController::class, 'eventAttendees']);
Route::get('/events/likes/{id}', [EventController::class, 'eventLikes'])->name('events.likes');
Route::post('/events/like', [EventController::class, 'likeEvent'])->name('events.like');

Route::post('/image', [ ImageController::class, 'ImageUploadStore' ]);
Route::get('/image/{id}', [ ImageController::class, 'getImage' ]);
Route::delete('/image/{id}', [ ImageController::class, 'deleteImage' ]);

Route::get('/messages', [MessageController::class, 'index']);
Route::get('/messages/{id}', [MessageController::class, 'show']);
Route::post('/messages', [MessageController::class, 'store']);
Route::put('/messages/{id}', [MessageController::class, 'update']);
Route::delete('/messages/{id}', [MessageController::class, 'delete']);
Route::get('/messages/user/{id}', [MessageController::class, 'messagesFromUser']);
Route::get('/messages/event/{id}', [MessageController::class, 'messagesFromEvent']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
// Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'delete']);
Route::get('/users/{id}/events', [UserController::class, 'userEvents']);
Route::get('/users/{id}/messages', [UserController::class, 'userMessages']);
Route::get('/users/{id}/liked-events', [UserController::class, 'userLikedEvents']);
Route::get('/users/{id}/subscribed-events', [UserController::class, 'userSubscribedEvents']);

Route::get('/login', [UserController::class, 'login']);
// Route::get('/logout', [UserController::class, 'logout']);
Route::get('/register', [UserController::class, 'register']);