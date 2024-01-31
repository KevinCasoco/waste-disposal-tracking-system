<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule');
    }

    public function index_collector()
    {
        return view('collector-schedule');
    }

    public function add_schedule()
    {
        // retrieve unique addresses for residents and populate to dropdown
        $locations = User::where('role', 'residents')->pluck('location', 'id')->unique();

        return view('add', compact('locations'));
    }

    public function add_schedule_collector()
    {
        // retrieve unique addresses for residents and populate to dropdown
        $locations = User::where('role', 'residents')->pluck('location', 'id')->unique();

        return view('add-collector', compact('locations'));
    }

    public function create(Request $request)
    {
        $userId = Auth::user()->id;

        // Parse the input time using Carbon
        $time = Carbon::parse($request->time)->format('h:i A');

        $schedule = new Schedule([
            'location' =>$request->location,
            'start' =>$request->start,
            'time' =>$time,
        ]);

        $user = User::find($userId);

        $user->schedules()->save($schedule);

        return redirect()->route('schedule')->with('message', 'Schedule added successfully');
    }

    public function create_collector(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        $userId = Auth::user()->id;

        // Parse the input time using Carbon
        $time = Carbon::parse($request->time)->format('h:i A');

        $schedule = new Schedule([
            'location' =>$request->location,
            'start' =>$request->start,
            'time' =>$time,
            'plate_no' => $user->plate_no,
        ]);

        $user = User::find($userId);

        $user->schedules()->save($schedule);

        return redirect()->route('collector-schedule')->with('message', 'Schedule added successfully');
    }


    public function getEvents()
    {
        $schedules = Schedule::all();
        return response()->json($schedules);
    }

    public function deleteEvent($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $schedule->update([
            'start' => Carbon::parse($request->input('start_date'))->setTimezone('UTC'),
            // 'end' => Carbon::parse($request->input('end_date'))->setTimezone('UTC'),
        ]);

        return response()->json(['message' => 'Event moved successfully']);
    }

    public function resize(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $newEndDate = Carbon::parse($request->input('end_date'))->setTimezone('UTC');
        $schedule->update(['end' => $newEndDate]);

        return response()->json(['message' => 'Event resized successfully.']);
    }

    public function search(Request $request)
    {
        $searchKeywords = $request->input('location');

        $matchingEvents = Schedule::where('location', 'like', '%' . $searchKeywords . '%')->get();

        return response()->json($matchingEvents);
    }
}
