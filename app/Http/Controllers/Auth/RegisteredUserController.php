<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // region name
        $response = Http::get("https://psgc.gitlab.io/api/regions/".$request->region);
        $region = $response->json('regionName');

        // province
        $response = Http::get("https://psgc.gitlab.io/api/provinces/".$request->province);
        $province = $response->json('name');

        // city-municipality
        $response = Http::get("https://psgc.gitlab.io/api/cities-municipalities/".$request->city);
        $city = $response->json('name');

        // barangay
        $response = Http::get("https://psgc.gitlab.io/api/barangays/".$request->barangay);
        $barangay = $response->json('name');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'residents', // Set default value for the role field
            'status' => 'active', // Set default value for the status field
            'region' => $region,
            'province' => $province,
            'city' => $city,
            'barangay' => $barangay,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
