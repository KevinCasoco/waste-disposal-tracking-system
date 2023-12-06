<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use App\Notifications\NewNotification;
use App\Notifications\WasteCollectionSchedule as NotificationsWasteCollectionSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WasteCollectionSchedule extends Controller
{
    public function sendNotification()
    {
        // // $users = User::all();
        // $users = User::where('status', 'active')->get();
        // $notification = new NewNotification();

        // foreach ($users as $user) {
        //     $user->notify($notification);
        // }

        // // return "Notification sent to all users.";
        // return view('schedule');

        $users = User::where('status', 'active')->get();
        $notification = new NewNotification();

        foreach ($users as $user) {
        // Access the schedules relationship
        $schedules = $user->schedules;

        foreach ($schedules as $schedule) {
            // Access schedule properties, for example:
            $start = $schedule->start;
            $time = $schedule->time;
        }

            // Notify the user
            $user->notify($notification);
        }

        return view('schedule');
    }

    public function showCollectorSchedule()
    {
        return view('collector-schedule');
    }

    public function showAdminSchedule()
    {
        return view('collector');
    }

    public function showNotificationForm()
    {
        return view('schedule');
    }

    public function collector_showNotificationForm()
    {
        return redirect()->route('collector-schedule')->with('message', 'Email was sent successfully');
    }

    public function admin_sendNotification()
    {
        // // $users = User::all();
        // $users = User::where('status', 'active')->get();
        // $notification = new NewNotification();

        // foreach ($users as $user) {
        //     $user->notify($notification);
        // }

        $users = User::where('status', 'active')->get();
        $notification = new NotificationsWasteCollectionSchedule();

        foreach ($users as $user) {
        // Access the schedules relationship
        $schedules = $user->schedules;

        foreach ($schedules as $schedule) {
            // Access schedule properties, for example:
            $start = $schedule->start;
            $time = $schedule->time;
        }

            // Notify the user
            $user->notify($notification);
        }

        // return "Notification sent to all users.";
        return redirect()->route('schedule')->with('message', 'Email was sent successfully');

    }

    public function collector_sendNotification()
    {
        // // $users = User::all();
        // $users = User::where('status', 'active')->get();
        // $notification = new NewNotification();

        // foreach ($users as $user) {
        //     $user->notify($notification);
        // }

        $users = User::where('status', 'active')->get();
        $notification = new NotificationsWasteCollectionSchedule();

        foreach ($users as $user) {
        // Access the schedules relationship
        $schedules = $user->schedules;

        foreach ($schedules as $schedule) {
            // Access schedule properties, for example:
            $start = $schedule->start;
            $time = $schedule->time;
        }

            // Notify the user
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
                'time' => $schedule->time,
                'color' => $color
            ];
        }

        return view('calendar', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $userId = Auth::user()->id;

        $schedule = new Schedule([
            'title' =>$request->title,
            'start_date' =>$request->start_date,
            'time' =>$request->time,
        ]);

        $user = User::find($userId);

        $user->schedules()->save($schedule);

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
            'time' =>$request->time,
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
