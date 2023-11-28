<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $rolesCount = User::select('role', DB::raw('count(*) as total'))
            ->groupBy('role')
            ->pluck('total', 'role')
            ->all();

        $labels = json_encode(array_keys($rolesCount));
        $data = json_encode(array_values($rolesCount));

        return view('dashboard', compact('labels', 'data'));
    }
}
