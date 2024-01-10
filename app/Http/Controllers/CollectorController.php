<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CollectorController extends Controller
{
    public function index()
    {
        // pagination for collector
        // $data = User::where('role', 'collector')->paginate(10);

        $data = User::where('role', 'collector')->get();

        return view('collector', compact('data'));
    }

    public function index_collector()
    {
        // pagination for collector
        // $data = User::where('role', 'residents')->paginate(10);

        $data = User::where('role', 'residents')->get();

        return view('collector-residents', compact('data'));
    }

    public function collector()
    {
        $data = User::where('role', 'collector')->get();

        return view('collector-residents', compact('data'));
    }

    // Add an update method to handle the form submission
    public function update_collector(Request $request, $id)
    {
        $data = User::find($id);

        if (!$data) {
            return redirect()->route('collector-residents')->with('error', 'Collector not found');
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

        return redirect()->route('collector-residents')->with('message', 'Collector updated successfully');
    }

    public function destroy_collector_residents($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('collector-residents')->with('message', 'Collector deleted successfully');
    }

    public function create_collector_residents(Request $request)
    {
        // Validate the request
        $request->validate([
            'plate_no' => ['required', 'string', 'regex:/^[0-9A-Z]{7}$/'],
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        // Create the collector
        User::create([
            'plate_no' => $request->input('plate_no'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('collector-residents')->with('message', 'Collector created successfully');
    }

    public function activateCollector($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'active';
        $item->save();

        return redirect()->route('collector-residents')->with('message', 'User activated successfully');
    }

    public function deactivateCollector($id)
    {
        $item = User::findOrFail($id);
        $item->status = 'inactive';
        $item->save();

        return redirect()->route('collector-residents')->with('message', 'User deactivated successfully');
    }

    public function toggleResidentsStatus($id)
    {
        $item = User::findOrFail($id);
        $item->status = $item->status === 'active' ? 'inactive' : 'active';
        $item->update();

        return redirect()->route('collector-residents')->with('message', 'User status updated successfully');
    }

    public function showLocation()
    {
        return view('location');
    }
}
