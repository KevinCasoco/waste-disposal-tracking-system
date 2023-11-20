<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CollectorController extends Controller
{
    public function index()
    {
        // $data = User::all(); // Replace YourModel with your actual model name

        // Fetch users based on role (e.g., 'admin' role)
        $data = User::where('role', 'collector')->get();

        return view('collector', compact('data'));
    }

    public function destroy_collector($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('collector')->with('success', 'User deleted successfully');
    }

    public function destroy_collector_residents($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('collector-residents')->with('success', 'User deleted successfully');
    }
}
