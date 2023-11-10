<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all(); // Replace YourModel with your actual model name

        return view('residents', compact('data'));
    }

}
