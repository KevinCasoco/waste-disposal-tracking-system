<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        // $data = User::all(); // Replace YourModel with your actual model name

        // Fetch users based on role (e.g., 'admin' role)
        $data = User::where('role', 'admin')->get();

        return view('admin', compact('data'));
    }

    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin')->with('success', 'User deleted successfully');
    }

    public function admin_destroy_collector($id)
    {
        $collector = User::findOrFail($id);
        $collector->delete();

        return redirect()->route('collector')->with('success', 'User deleted successfully');
    }

    public function admin_destroy_residents($id)
    {
        $residents = User::findOrFail($id);
        $residents->delete();

        return redirect()->route('residents')->with('success', 'User deleted successfully');
    }

    public function create_admin(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        // Create the user
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'role' => $request->input('role'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('admin')->with('success', 'User created successfully');
    }

    public function create_collector(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => 'required|string|min:8',
            'role' => 'required|string',
        ]);

        // Create the user
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('collector')->with('success', 'User created successfully');
    }

    // Add an update method to handle the form submission
    public function update(Request $request, $id)
    {
        $data = User::find($id);

        if (!$data) {
            return redirect()->route('admin')->with('error', 'User not found');
        }

        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $data->id,
            'password' => 'nullable|string|min:6',
            // 'role' => 'string',
        ]);

        // Update user information
        $data->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->has('password') ? bcrypt($request->input('password')) : $data->password,
            // 'role' => $request->input('role'),
        ]);

        return redirect()->route('admin')->with('success', 'User updated successfully');
    }

    // Add an update method to handle the form submission
    public function update_collector(Request $request, $id)
    {
        $data = User::find($id);

        if (!$data) {
            return redirect()->route('collector')->with('error', 'User not found');
        }

        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $data->id,
            'password' => 'nullable|string|min:6',
            // 'role' => 'string',
        ]);

        // Update user information
        $data->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->has('password') ? bcrypt($request->input('password')) : $data->password,
            // 'role' => $request->input('role'),
        ]);

        return redirect()->route('collector')->with('success', 'User updated successfully');
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $data->id,
            'password' => 'nullable|string|min:6',
            // 'role' => 'string',
        ]);

        // Update user information
        $data->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->has('password') ? bcrypt($request->input('password')) : $data->password,
            // 'role' => $request->input('role'),
        ]);

        return redirect()->route('residents')->with('success', 'User updated successfully');
    }

    public function activateUser($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'active';
        $item->save();

        return redirect()->route('admin')->with('success', 'User activated successfully');
    }

    public function deactivateUser($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'inactive';
        $item->save();

        return redirect()->route('admin')->with('success', 'User deactivated successfully');
    }

    public function toggleUserStatus($id)
    {
        $item = User::findOrFail($id);
        $item->status = $item->status === 'active' ? 'inactive' : 'active';
        $item->update();

        return redirect()->route('admin')->with('success', 'User status updated successfully');
    }

    public function toggleCollectorStatus($id)
    {
        $item = User::findOrFail($id);
        $item->status = $item->status === 'active' ? 'inactive' : 'active';
        $item->update();

        return redirect()->route('collector')->with('success', 'User status updated successfully');
    }

    public function activateCollector($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'active';
        $item->save();

        return redirect()->route('collector')->with('success', 'User activated successfully');
    }

    public function deactivateCollector($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'inactive';
        $item->save();

        return redirect()->route('collector')->with('success', 'User deactivated successfully');
    }

    public function toggleResidentsStatus($id)
    {
        $item = User::findOrFail($id);
        $item->status = $item->status === 'active' ? 'inactive' : 'active';
        $item->update();

        return redirect()->route('residents')->with('success', 'User status updated successfully');
    }

    public function activateResidents($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'active';
        $item->save();

        return redirect()->route('residents')->with('success', 'User activated successfully');
    }

    public function deactivateResidents($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'inactive';
        $item->save();

        return redirect()->route('residents')->with('success', 'User deactivated successfully');
    }


}
