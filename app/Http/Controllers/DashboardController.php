<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use App\Models\SensorData;
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

}
