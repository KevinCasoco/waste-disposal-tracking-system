<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update plate number
        if ($request->filled('plate_number')) {
            $user->plate_number = $request->input('plate_number');
        }

        // Update first name
        if ($request->filled('first_name')) {
            $user->first_name = $request->input('first_name');
        }

        // Update last name
        if ($request->filled('last_name')) {
            $user->last_name = $request->input('last_name');
        }

        // Update location
        if ($request->filled('location')) {
            $user->location = $request->input('location');
        }

        // Update number
        if ($request->filled('number')) {
            $user->number = $request->input('number');
        }

        // Update other fields using fill if needed
        $user->fill($request->except(['_token', '_method', 'first_name', 'last_name', 'plate_number', 'location', 'number']));

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
