<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use App\Models\SensorData;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SensorNotification;
use App\Notifications\TrashBinNotification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function countUsersByRole()
    {
        $chartData = [
            'admin' => [
                'active' => User::where('role', 'admin')->where('status', 'active')->count(),
                'inactive' => User::where('role', 'admin')->where('status', 'inactive')->count(),
            ],
            'collector' => [
                'active' => User::where('role', 'collector')->where('status', 'active')->count(),
                'inactive' => User::where('role', 'collector')->where('status', 'inactive')->count(),
            ],
            'residents' => [
                'active' => User::where('role', 'residents')->where('status', 'active')->count(),
                'inactive' => User::where('role', 'residents')->where('status', 'inactive')->count(),
            ],
        ];

            $chart = User::all();

            $countAdmins = User::where('role', 'admin')->count();
            $countCollector = User::where('role', 'collector')->count();
            $countResidents = User::where('role', 'residents')->count();
            $countSchedules = Schedule::count();
            $totalUser = User::count();

            $truck_weight = SensorData::orderBy('id', 'desc')->value('truck_weight');
            $trash_weight = SensorData::orderBy('id', 'desc')->value('trash_weight');

        return view('dashboard', compact('chartData', 'chart', 'countAdmins', 'countCollector', 'countResidents',  'countSchedules', 'totalUser', 'truck_weight', 'trash_weight'));
    }

    // manually send the email when you click the container of truck and trash in dashboard
    public function getTruckWeight()
    {
        $truck_weight = SensorData::orderBy('id', 'desc')->value('truck_weight');
        return response()->json(['truck_weight' => $truck_weight]);
    }

    public function getTrashWeight()
    {
        $trash_weight = SensorData::orderBy('id', 'desc')->value('trash_weight');
        return response()->json(['trash_weight' => $trash_weight]);
    }

    // automatic send the email when the max kilogram exceed
    // public function getTruckWeight()
    // {
    //     $latestWeight = SensorData::orderBy('id', 'desc')->value('truck_weight');

    //     if ($latestWeight !== null && $latestWeight >= 1.0000) {
    //         $admins = User::where('role', 'admin')->get();
    //         Notification::send($admins, new SensorNotification());
    //         $message = 'Notification sent to admins.';
    //     } else {
    //         $message = 'Weight is within limit.';
    //     }

    //     return response()->json([
    //         'truck_weight' => $latestWeight,
    //         'message' => $message
    //     ]);
    // }

    // automatic send the email when the max kilogram exceed
    // public function getTrashWeight()
    // {
    //     // Retrieve the last recorded weight from the SensorData model
    //     $latestWeight = SensorData::orderBy('id', 'desc')->value('trash_weight');

    //     if ($latestWeight !== null && $latestWeight >= 1.0000) {
    //         $admins = User::where('role', 'admin')->get();
    //         Notification::send($admins, new TrashBinNotification());
    //         return response()->json([
    //             'message' => 'Notification sent to admins.',
    //             'trash_weight' => $latestWeight // Include the trash weight in the response
    //         ]);
    //     }

    //     return response()->json([
    //         'message' => 'Weight is within limit.',
    //         'trash_weight' => $latestWeight // Include the trash weight in the response
    //     ]);
    // }

}
