<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\NewNotification;
use Illuminate\Http\Request;

class WasteCollectionSchedule extends Controller
{
    public function sendNotification()
    {
        // $users = User::all();
        $users = User::where('status', 'active')->get();
        $notification = new NewNotification();

        foreach ($users as $user) {
            $user->notify($notification);
        }

        // return "Notification sent to all users.";
        return view('schedule');
    }

    public function showNotificationForm()
    {
        return view('schedule');
    }

    public function addEvent(Request $request)
    {
        $validatedData = $request->validate([
            'event_title' => 'required|string',
            'event_date' => 'required|date',
            'event_theme' => 'required|string',
        ]);

        $event = User::create([
            'title' => $validatedData['event_title'],
            'date' => $validatedData['event_date'],
            'theme' => $validatedData['event_theme'],
        ]);

        return response()->json(['message' => 'Event added successfully', 'event' => $event]);
    }

    public function getEvents()
    {
        $events = User::all();

        return response()->json(['events' => $events]);
    }
}
