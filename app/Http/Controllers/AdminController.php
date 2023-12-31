<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        // pagination for admin
        // $data = User::where('role', 'admin')->paginate(10);

        $data = User::where('role', 'admin')->get();

        return view('admin', compact('data'));
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin')->with('message', 'Admin deleted successfully');
    }

    public function admin_destroy_collector($id)
    {
        $collector = User::findOrFail($id);
        $collector->delete();

        return redirect()->route('collector')->with('message', 'Collector deleted successfully');
    }

    public function admin_destroy_residents($id)
    {
        $residents = User::findOrFail($id);
        $residents->delete();

        return redirect()->route('residents')->with('message', 'Residents deleted successfully');
    }

    public function create_admin(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        // Create the user
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'role' => $request->input('role'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin')->with('message', 'Admin created successfully');
    }

    public function create_collector(Request $request)
    {
        // Validate the request
        $request->validate([
            'plate_no' => ['required', 'string', 'regex:/^[0-9A-Z]{7}$/'],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        // Create the user
        User::create([
            'plate_no' => $request->input('plate_no'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'role' => $request->input('role'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('collector')->with('message', 'Collector created successfully');
    }

    public function create_residents(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'number' => ['required', 'regex:/^\+639\d{9}$/'],
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'status' => 'required|string',
            'location' => 'required|string',
        ]);

        // Create the user
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'number' => $request->input('number'),
            'password' => Hash::make($request->password),
            'role' => $request->input('role'),
            'status' => $request->input('status'),
            'location' => $request->input('location'),
        ]);

        return redirect()->route('residents')->with('message', 'Residents created successfully');
    }

    // Add an update method to handle the form submission
    public function update(Request $request, $id)
    {
        $data = User::find($id);

        if (!$data) {
            return redirect()->route('admin')->with('error', 'Admin not found');
        }

        // Validate the request
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $data->id,
            'password' => 'nullable|string|min:6',
            // 'role' => 'string',
        ]);

        // Update user information
        $data->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => $request->has('password') ? bcrypt($request->input('password')) : $data->password,
            // 'role' => $request->input('role'),
        ]);

        return redirect()->route('admin')->with('message', 'Admin updated successfully');
    }

    // Add an update method to handle the form submission
    public function update_collector(Request $request, $id)
    {
        $data = User::find($id);

        if (!$data) {
            return redirect()->route('collector')->with('error', 'Collector not found');
        }

        // Validate the request
        $request->validate([
            'plate_no' => ['required', 'string', 'regex:/^[0-9A-Z]{7}$/'],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $data->id,
            'password' => 'nullable|string|min:8',
        ]);

        // Update collector information
        $data->update([
            'plate_no' => $request->input('plate_no'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => $request->has('password') ? bcrypt($request->input('password')) : $data->password,
        ]);

        return redirect()->route('collector')->with('message', 'Collector updated successfully');
    }

    // Add an update method to handle the form submission
    public function update_residents(Request $request, $id)
    {
        $data = User::find($id);

        if (!$data) {
            return redirect()->route('residents')->with('error', 'User not found');
        }

        // Validate the request
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $data->id,
            'password' => 'nullable|string|min:6',
            'location' => 'nullable|string',
            // 'role' => 'string',
        ]);

        // Update user information
        $data->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => $request->has('password') ? bcrypt($request->input('password')) : $data->password,
            'location' => $request->input('location'),
            // 'role' => $request->input('role'),
        ]);

        return redirect()->route('residents')->with('message', 'User updated successfully');
    }

    public function activateUser($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'active';
        $item->save();

        return redirect()->route('admin')->with('message', 'Admin activated successfully');
    }

    public function deactivateUser($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'inactive';
        $item->save();

        return redirect()->route('admin')->with('message', 'Admin deactivated successfully');
    }

    public function toggleUserStatus($id)
    {
        $item = User::findOrFail($id);
        $item->status = $item->status === 'active' ? 'inactive' : 'active';
        $item->update();

        return redirect()->route('admin')->with('message', 'Admin status updated successfully');
    }

    public function toggleCollectorStatus($id)
    {
        $item = User::findOrFail($id);
        $item->status = $item->status === 'active' ? 'inactive' : 'active';
        $item->update();

        return redirect()->route('collector')->with('message', 'Collector status updated successfully');
    }

    public function activateCollector($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'active';
        $item->save();

        return redirect()->route('collector')->with('message', 'Collector activated successfully');
    }

    public function deactivateCollector($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'inactive';
        $item->save();

        return redirect()->route('collector')->with('message', 'Collector deactivated successfully');
    }

    public function toggleResidentsStatus($id)
    {
        $item = User::findOrFail($id);
        $item->status = $item->status === 'active' ? 'inactive' : 'active';
        $item->update();

        return redirect()->route('residents')->with('message', 'User status updated successfully');
    }

    public function activateResidents($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'active';
        $item->save();

        return redirect()->route('residents')->with('message', 'User activated successfully');
    }

    public function deactivateResidents($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'inactive';
        $item->save();

        return redirect()->route('residents')->with('message', 'User deactivated successfully');
    }

    public function showSchedule()
    {
        return view('schedule');
    }

}
