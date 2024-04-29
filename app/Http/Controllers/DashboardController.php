<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use App\Models\SensorData;
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

    // graph for truck collection and trash bin included
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
        } elseif ($truck_weight >= 0.9000) {
            $status_truck = '90% ';
        } elseif ($truck_weight >= 0.8000) {
            $status_truck = '80% ';
        } elseif ($truck_weight >= 0.7000) {
            $status_truck = '70% ';
        } elseif ($truck_weight >= 0.6000) {
            $status_truck = '60% ';
        } elseif ($truck_weight >= 0.5000) {
            $status_truck = '50% ';
        } elseif ($truck_weight >= 0.4000) {
            $status_truck = '40% ';
        } elseif ($truck_weight >= 0.3000) {
            $status_truck = '30% ';
        } elseif ($truck_weight >= 0.2000) {
            $status_truck = '20% ';
        } elseif ($truck_weight >= 0.1000) {
            $status_truck = '10% ';
        } else {
            $status_truck = '0% ';
        }

        $trash_weight = (float)TrashCan::orderBy('id', 'desc')->value('trash_weight');
        $status = '';

        if ($trash_weight == 0.0000) {
            $status = '0%';
        } elseif ($trash_weight >= 1.0000) {
            $status = '100% Full';
        } elseif ($trash_weight >= 0.9000) {
            $status = '90% ';
        } elseif ($trash_weight >= 0.8000) {
            $status = '80% ';
        } elseif ($trash_weight >= 0.7000) {
            $status = '70% ';
        } elseif ($trash_weight >= 0.6000) {
            $status = '60% ';
        } elseif ($trash_weight >= 0.5000) {
            $status = '50% ';
        } elseif ($trash_weight >= 0.4000) {
            $status = '40% ';
        } elseif ($trash_weight >= 0.3000) {
            $status = '30% ';
        } elseif ($trash_weight >= 0.2000) {
            $status = '20% ';
        } elseif ($trash_weight >= 0.1000) {
            $status = '10% ';
        } else {
            $status = '0% ';
        }

        return view('dashboard', compact('chartData', 'chart', 'countAdmins', 'countCollector', 'countResidents', 'countSchedules', 'totalUser', 'truck_weight', 'trash_weight', 'chartWeightData', 'chartWeightTrashData', 'status', 'status_truck'));
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
        } elseif ($truck_weight >= 0.9000) {
            $status_truck = '90% ';
        } elseif ($truck_weight >= 0.8000) {
            $status_truck = '80% ';
        } elseif ($truck_weight >= 0.7000) {
            $status_truck = '70% ';
        } elseif ($truck_weight >= 0.6000) {
            $status_truck = '60% ';
        } elseif ($truck_weight >= 0.5000) {
            $status_truck = '50% ';
        } elseif ($truck_weight >= 0.4000) {
            $status_truck = '40% ';
        } elseif ($truck_weight >= 0.3000) {
            $status_truck = '30% ';
        } elseif ($truck_weight >= 0.2000) {
            $status_truck = '20% ';
        } elseif ($truck_weight >= 0.1000) {
            $status_truck = '10% ';
        } else {
            $status_truck = '0% ';
        }

        return response()->json(['truck_weight' => $truck_weight, 'status_truck' => $status_truck]);
    }

    public function getTrashWeightStatus()
    {
        $trash_weight = (float) TrashCan::orderBy('id', 'desc')->value('trash_weight');
        $status = '';

        if ($trash_weight == 0.0000) {
            $status = '0%';
        } elseif ($trash_weight >= 1.0000) {
            $status = '100% Full';
        } elseif ($trash_weight >= 0.9000) {
            $status = '90%';
        } elseif ($trash_weight >= 0.8000) {
            $status = '80%';
        } elseif ($trash_weight >= 0.7000) {
            $status = '70%';
        } elseif ($trash_weight >= 0.6000) {
            $status = '60%';
        } elseif ($trash_weight >= 0.5000) {
            $status = '50%';
        } elseif ($trash_weight >= 0.4000) {
            $status = '40%';
        } elseif ($trash_weight >= 0.3000) {
            $status = '30%';
        } elseif ($trash_weight >= 0.2000) {
            $status = '20%';
        } elseif ($trash_weight >= 0.1000) {
            $status = '10%';
        } else {
            $status = '0%';
        }

        return response()->json(['trash_weight' => $trash_weight, 'status' => $status]);
    }

    // automatic send the email when the max kilogram exceed
    public function getTruckWeight()
    {
        $formattedWeight = Truck::orderBy('id', 'desc')->value('truck_weight');

        // Formatting the weight to have two decimal places
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
        // Retrieve the last recorded weight from the SensorData model
        $formattedWeight = TrashCan::orderBy('id', 'desc')->value('trash_weight');

        // Formatting the weight to have two decimal places
        $latestWeight = number_format($formattedWeight, 2);

        if ($latestWeight !== null && $latestWeight >= 1.0000) {
            $admins = User::where('role', 'admin')->get();
            Notification::send($admins, new TrashBinNotification());
            return response()->json([
                'message' => 'Notification sent to admins.',
                'trash_weight' => $latestWeight // Include the trash weight in the response
            ]);
        }

        return response()->json([
            'message' => 'Weight is within limit.',
            'trash_weight' => $latestWeight // Include the trash weight in the response
        ]);
    }

}
