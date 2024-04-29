<?php

namespace App\Http\Controllers;

use App\Models\TrashBin;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // pagination for residents
        // $data = User::where('role', 'residents')->paginate(10);

        // Fetch users based on role (e.g., 'admin' role)
        $data = User::where('role', 'residents')->get();

        $locations = User::where('role', 'residents')->pluck('location', 'id')->unique();

        return view('residents', compact('data','locations'));
    }

    public function index_residents()
    {
        // pagination for residents
        // $data = User::where('role', 'residents')->paginate(10);

        // Fetch users based on role (e.g., 'admin' role)
        $data = User::where('role', 'residents')->get();

        return view('user-residents', compact('data'));
    }

    // Add an update method to handle the form submission
    public function update_user_residents(Request $request, $id)
    {
        $data = User::find($id);

        if (!$data) {
            return redirect()->route('user-residents')->with('error', 'User not found');
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

        return redirect()->route('user-residents')->with('message', 'User updated successfully');
    }

    public function collector_residents()
    {
        // Fetch users based on role (e.g., 'admin' role)
        $data = User::where('role', 'residents')->get();

        return view('collector-residents', compact('data'));
    }

    public function residents()
    {
        // Fetch users based on role (e.g., 'admin' role)
        $data = User::where('role', 'residents')->get();

        return view('user-residents', compact('data'));
    }

    public function destroy_user_residents($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('user-residents')->with('message', 'User deleted successfully');
    }

    public function showUserSchedule()
    {
        return view('user-schedule');
    }

    public function showKitchenWaste()
    {
        return view('kitchen-waste');
    }

    public function showRecyclableWaste()
    {
        return view('recyclable-waste');
    }

    public function showHazardousWaste()
    {
        return view('hazardous-waste');
    }

    public function showAugmentedReality()
    {
        return view('augmented-reality');
    }

    public function showTrashBin()
    {
        $trashBins = TrashBin::all();

        return view('residents-trash-bin' , compact('trashBins'));
    }

    public function restore_residents_info($id)
    {
        $record = User::withTrashed()->findOrFail($id);

        $record->restore();

        return redirect()->back()->with('success', 'Record restored successfully.');
    }

    public function residents_restore_data(Request $request)
    {
        // Retrieve soft deleted records
        $data_user = User::where('role', 'residents')->get();
        $deletedRecords = User::onlyTrashed()->where('role', 'residents')->get();
        $dataQuery = User::query();
        $locations = User::where('role', 'residents')->pluck('location', 'id')->unique();

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;

            $dataQuery->whereDate('start', '>=', $start_date)
                      ->whereDate('start', '<=', $end_date);
        }

        $data = $dataQuery->get();

        return view('residents-restore', compact('data_user', 'locations', 'data', 'deletedRecords'));
    }

}
