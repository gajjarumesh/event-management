<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum', RoleMiddleware::class . ':admin'])->get('/events/{event}/registrations', function (App\Models\Event $event) {
    return $event->users()->select('users.id', 'users.name', 'users.email')->get();
});
