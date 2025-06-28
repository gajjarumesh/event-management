<?php

namespace App\Http\Controllers;

use App\Mail\EventRegistrationMail;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventRegistrationController extends Controller
{
    public function register(Event $event)
    {
        if (!$event->users()->where('user_id', auth()->id())->exists()) {
            $event->users()->attach(auth()->id());

            Mail::to(auth()->user()->email)->send(new EventRegistrationMail($event));

            return back()->with('success', 'Registered successfully. A confirmation email has been sent.');
        }

        return back()->with('info', 'You are already registered for this event.');
    }

    public function unregister(Event $event)
    {
        $event->users()->detach(auth()->id());
        return back()->with('success', 'Unregistered successfully.');
    }
}
