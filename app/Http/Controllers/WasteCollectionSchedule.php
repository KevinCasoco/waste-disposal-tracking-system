<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
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

    public function collector_showNotificationForm()
    {
        return redirect()->route('collector-schedule')->with('message', 'Email was sent successfully');
    }

    public function collector_sendNotification()
    {
        // $users = User::all();
        $users = User::where('status', 'active')->get();
        $notification = new NewNotification();

        foreach ($users as $user) {
            $user->notify($notification);
        }

        // return "Notification sent to all users.";
        return redirect()->route('collector-schedule')->with('message', 'Email was sent successfully');

    }

    // public function addEvent(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'event_title' => 'required|string',
    //         'event_date' => 'required|date',
    //         'event_theme' => 'required|string',
    //     ]);

    //     $event = User::create([
    //         'title' => $validatedData['event_title'],
    //         'date' => $validatedData['event_date'],
    //         'theme' => $validatedData['event_theme'],
    //     ]);

    //     return response()->json(['message' => 'Event added successfully', 'event' => $event]);
    // }

    // public function getEvents()
    // {
    //     $events = User::all();

    //     return response()->json(['events' => $events]);
    // }

    // public function store(Request $request, $userId)
    // {
    //     // Find the user
    //     $user = User::find($userId);

    //     // Create a new schedule for the user
    //     $schedule = $user->schedules()->create([
    //         'title' => $request->input('title'),
    //         'start_time' => $request->input('start_time'),
    //         'end_time' => $request->input('end_time'),
    //         // Add other schedule-related data
    //     ]);

    //     // Other logic or redirect as needed
    // }

    public function index()
    {
        $events = array();
        $schedules = Schedule::all();
        foreach($schedules as $schedule) {
            $events[] = [
                'title' => $schedule->title,
                'start' => $schedule->start_date,
                'end' => $schedule->end_date,
            ];
        }

        return view('calendar', ['events' => $events]);
    }
}
