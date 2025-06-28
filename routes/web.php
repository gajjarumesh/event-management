<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRegistrationController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Event;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::resource('events', EventController::class)->names('events');
});

Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::get('user/events', function () {
        $events = Event::with('users')->get();
        return view('events.user-index', compact('events'));
    })->name("user-events");

    Route::post('events/{event}/register', [EventRegistrationController::class, 'register']);
    Route::delete('events/{event}/unregister', [EventRegistrationController::class, 'unregister']);
});

require __DIR__ . '/auth.php';
