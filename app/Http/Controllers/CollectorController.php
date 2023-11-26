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

    public function destroy_collector_residents($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('collector-residents')->with('success', 'User deleted successfully');
    }

    public function create_collector_residents(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        // Create the user
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('collector-residents')->with('success', 'User created successfully');
    }

    public function activateCollector($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'active';
        $item->save();

        return redirect()->route('collector-residents')->with('success', 'User activated successfully');
    }

    public function deactivateCollector($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'inactive';
        $item->save();

        return redirect()->route('collector-residents')->with('success', 'User deactivated successfully');
    }

    public function toggleResidentsStatus($id)
    {
        $item = User::findOrFail($id);
        $item->status = $item->status === 'active' ? 'inactive' : 'active';
        $item->update();

        return redirect()->route('collector-residents')->with('success', 'User status updated successfully');
    }
}
