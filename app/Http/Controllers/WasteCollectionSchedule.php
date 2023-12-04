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

    public function schedule()
    {
        $events = array();
        $schedules = Schedule::all();
        foreach($schedules as $schedule) {
            $color = null;
            if ($schedule->title == 'Test') {
                $color = '#924ACE';
                // return $color;
            }

            if ($schedule->title == 'Test 1') {
                $color = '#68801A';
                // return $color;
            }

            $events[] = [
                'id' => $schedule->id,
                'title' => $schedule->title,
                'start' => $schedule->start_date,
                'end' => $schedule->end_date,
                'color' => $color
            ];
        }

        return view('calendar', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $schedule = Schedule::create([
            'title' =>$request->title,
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
        ]);

        return response()->json($schedule);
    }

    public function update(Request $request, $id)
    {
        $schedules = Schedule::find($id);
            if(!$schedules) {
                return response()->json([
                    'error' => 'Unable to locate the ID'
                ], 404);
            }

        $schedules->update([
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
        ]);

        return response()->json('Event updated');
    }

    public function delete($id)
    {
        $schedules = Schedule::find($id);
            if(!$schedules) {
                return response()->json([
                    'error' => 'Unable to locate the ID'
                ], 404);
            }

        $schedules->delete();
        return $id;
        // return response()->json('Event deleted');

    }
}
