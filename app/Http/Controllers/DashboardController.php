<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use App\Models\SensorData;
use App\Models\TrashBin;
use App\Models\Truck;
use App\Models\TrashCan;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SensorNotification;
use App\Notifications\TrashBinNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function countUsersByRole()
    // {
    //     $chartData = [
    //         'admin' => [
    //             'active' => User::where('role', 'admin')->where('status', 'active')->count(),
    //             'inactive' => User::where('role', 'admin')->where('status', 'inactive')->count(),
    //         ],
    //         'collector' => [
    //             'active' => User::where('role', 'collector')->where('status', 'active')->count(),
    //             'inactive' => User::where('role', 'collector')->where('status', 'inactive')->count(),
    //         ],
    //         'residents' => [
    //             'active' => User::where('role', 'residents')->where('status', 'active')->count(),
    //             'inactive' => User::where('role', 'residents')->where('status', 'inactive')->count(),
    //         ],
    //     ];

    //         $chart = User::all();

    //         $countAdmins = User::where('role', 'admin')->count();
    //         $countCollector = User::where('role', 'collector')->count();
    //         $countResidents = User::where('role', 'residents')->count();
    //         $countSchedules = Schedule::count();
    //         $totalUser = User::count();

    //         $truck_weight = SensorData::orderBy('id', 'desc')->value('truck_weight');
    //         $trash_weight = SensorData::orderBy('id', 'desc')->value('trash_weight');

    //     return view('dashboard', compact('chartData', 'chart', 'countAdmins', 'countCollector', 'countResidents',  'countSchedules', 'totalUser', 'truck_weight', 'trash_weight'));
    // }

    // data fetch from dashboard
    public function dashboardData()
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

        $chartWeightData = [
            'monthly' => [
                'monthlyData' => Truck::whereMonth('updated_at', date('m'))->sum('truck_weight'),
            ],
            'weekly' => [
                'weeklyData' => Truck::whereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('truck_weight'),
            ],
            'daily' => [
                // 'dailyData' => Truck::whereDate('updated_at', date('Y-m-d'))->sum('truck_weight')
                'dailyData' => Truck::whereDate('updated_at', date('Y-m-d'))->pluck('truck_weight')->last(),
            ],
        ];

        $barangays = range(176, 185);
        $chartWeightTrashBinData = [
            'barangay' => []
        ];

        foreach ($barangays as $barangay) {
            $chartWeightTrashBinData['barangay']["barangay_$barangay"] = TrashBin::where('trash_bin_location', "barangay $barangay")->count();
        }

        $chartWeightTrashData = [
            'monthly' => [
                'monthlyData' => TrashCan::whereMonth('updated_at', date('m'))->sum('trash_weight'),
            ],
            'weekly' => [
                'weeklyData' => TrashCan::whereBetween('updated_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('trash_weight'),
            ],
            'daily' => [
                // 'dailyData' => TrashCan::whereDate('updated_at', date('Y-m-d'))->sum('trash_weight')
                'dailyData' => TrashCan::whereDate('updated_at', date('Y-m-d'))->pluck('trash_weight')->last(),
            ],
        ];

        $chart = User::all();

        $countAdmins = User::where('role', 'admin')->count();
        $countCollector = User::where('role', 'collector')->count();
        $countResidents = User::where('role', 'residents')->count();
        $countSchedules = Schedule::count();
        $totalUser = User::count();

        $truck_weight = (float)Truck::orderBy('id', 'desc')->value('truck_weight');
        $status_truck = '';

        if ($truck_weight == 0.0000) {
            $status_truck = '0%';
        } elseif ($truck_weight >= 1.0000) {
            $status_truck = '100% Full';
        } else {
            $percentage = (int)($truck_weight * 100);
            $status_truck = $percentage . '%';
        }

        $trash_weight = (float)TrashCan::orderBy('id', 'desc')->value('trash_weight');
        $status_trash_bin = '';

        if ($trash_weight == 0.0000) {
            $status_trash_bin = '0%';
        } elseif ($trash_weight >= 1.0000) {
            $status_trash_bin = '100% Full';
        } else {
            $percentage = (int)($trash_weight * 100);
            $status_trash_bin = $percentage . '%';
        }

        return view('dashboard', compact(
            'chartData',
            'chart',
            'countAdmins',
            'countCollector',
            'countResidents',
            'countSchedules',
            'totalUser',
            'truck_weight',
            'trash_weight',
            'chartWeightData',
            'chartWeightTrashData',
            'status_trash_bin',
            'status_truck',
            'chartWeightTrashBinData'
        ));
    }

    // manually send the email when you click the container of truck and trash in dashboard
    // public function getTruckWeight()
    // {
    //     $formatted_weight = Truck::orderBy('id', 'desc')->value('truck_weight');
    //     $truck_weight = number_format($formatted_weight, 2);
    //     return response()->json(['truck_weight' => $truck_weight]);
    // }

    // public function getTrashWeight()
    // {
    //     $formatted_weight = TrashCan::orderBy('id', 'desc')->value('trash_weight');
    //     $trash_weight = number_format($formatted_weight, 2);
    //     return response()->json(['trash_weight' => $trash_weight]);
    // }

    public function getTruckWeightStatus()
    {

        $truck_weight = (float)Truck::orderBy('id', 'desc')->value('truck_weight');
        $status_truck = '';

        if ($truck_weight == 0.0000) {
            $status_truck = '0%';
        } elseif ($truck_weight >= 1.0000) {
            $status_truck = '100% Full';
        } else {
            $percentage = (int)($truck_weight * 100);
            $status_truck = $percentage . '%';
        }

        return response()->json([
            'truck_weight' => $truck_weight,
            'status_truck' => $status_truck
        ]);
    }

    public function getTrashWeightStatus()
    {
        $trash_weight = (float)TrashCan::orderBy('id', 'desc')->value('trash_weight');
        $status_trash_bin = '';

        if ($trash_weight == 0.0000) {
            $status_trash_bin = '0%';
        } elseif ($trash_weight >= 1.0000) {
            $status_trash_bin = '100% Full';
        } else {
            $percentage = (int)($trash_weight * 100);
            $status_trash_bin = $percentage . '%';
        }

        return response()->json([
            'trash_weight' => $trash_weight,
            'status' => $status_trash_bin
        ]);
    }

    // automatic send the email when the max kilogram exceed
    public function getTruckWeight()
    {
        $formattedWeight = Truck::orderBy('id', 'desc')->value('truck_weight');
        $latestWeight = number_format($formattedWeight, 2);

        if ($latestWeight !== null && $latestWeight >= 1.00) {
            $admins = User::where('role', 'admin')->get();
            Notification::send($admins, new SensorNotification());
            $message = 'Notification sent to admins.';
        } else {
            $message = 'Weight is within limit.';
        }

        return response()->json([
            'truck_weight' => $latestWeight,
            'message' => $message
        ]);
    }

    // automatic send the email when the max kilogram exceed
    public function getTrashWeight()
    {
        $formattedWeight = TrashCan::orderBy('id', 'desc')->value('trash_weight');
        $latestWeight = number_format($formattedWeight, 2);

        if ($latestWeight !== null && $latestWeight >= 1.0000) {
            $admins = User::where('role', 'admin')->get();
            Notification::send($admins, new TrashBinNotification());
            return response()->json([
                'message' => 'Notification sent to admins.',
                'trash_weight' => $latestWeight
            ]);
        }

        return response()->json([
            'message' => 'Weight is within limit.',
            'trash_weight' => $latestWeight
        ]);
    }

}
