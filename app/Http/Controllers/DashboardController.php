<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function countUsersByRole() {
        $countAdmins = User::where('role', 'admin')->count();
        $countCollector = User::where('role', 'collector')->count();
        $countResidents = User::where('role', 'residents')->count();


        return view('dashboard',
            ['countAdmins' => $countAdmins,
            'countCollector' => $countCollector,
            'countResidents' => $countResidents,
        ]);
    }
}
