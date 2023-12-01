<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChartController extends Controller
{
    public function getChartData()
    {
    $data = [
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

    return response()->json($data);
    }

}
