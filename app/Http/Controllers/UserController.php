<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $data = User::all(); // Replace YourModel with your actual model name

        // Fetch users based on role (e.g., 'admin' role)
        $data = User::where('role', 'residents')->get();

        return view('residents', compact('data'));
    }

    public function residents()
    {
        // $data = User::all(); // Replace YourModel with your actual model name

        // Fetch users based on role (e.g., 'admin' role)
        $data = User::where('role', 'residents')->get();

        return view('user-residents', compact('data'));
    }

    public function collector()
    {
        // $data = User::all(); // Replace YourModel with your actual model name

        // Fetch users based on role (e.g., 'admin' role)
        $data = User::where('role', 'residents')->get();

        return view('editor-residents', compact('data'));
    }

}
