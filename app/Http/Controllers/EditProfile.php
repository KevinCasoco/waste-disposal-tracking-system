<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EditProfile extends Controller
{
    public function edit($id)
    {
        // Retrieve the user based on the ID
        $user = User::findOrFail($id);

    // Pass the user data to the view
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'role' => 'required|in:Admin,Collector,Residents',
        ]);

        // Retrieve the user based on the ID
        $user = User::findOrFail($id);

        // Update the user data
        $user->update([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'role' => $request->input('role'),
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.edit', $user->id)->with('success', 'Profile updated successfully');
    }

}
