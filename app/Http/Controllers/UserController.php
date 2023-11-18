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
        $data = User::where('role', 'collector')->get();

        return view('collector-residents', compact('data'));
    }

    // public function destroy_collector(User $collector)
    // {
    //     $collector->delete();
    //     return redirect()->route('collector')->with('success', 'Collector deleted successfully');
    // }

    public function destroy_residents(User $residents)
    {
        $residents->delete();
        return redirect()->route('residents')->with('success', 'Collector deleted successfully');
    }

    public function destroy_user_residents(User $user_residents)
    {
        $user_residents->delete();
        return redirect()->route('user-residents')->with('success', 'Collector deleted successfully');
    }

    public function destroy_collector_residents(User $collector_residents)
    {
        $collector_residents->delete();
        return redirect()->route('collector-residents')->with('success', 'Collector deleted successfully');
    }

}
