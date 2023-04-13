<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/events', 'App\Http\Controllers\EventController@index');
Route::get('/events/{id}', 'App\Http\Controllers\EventController@show');
Route::post('/events', 'App\Http\Controllers\EventController@store');
Route::put('/events/{id}', 'App\Http\Controllers\EventController@update');
Route::delete('/events/{id}', 'App\Http\Controllers\EventController@delete');

