<x-guest-layout>
    {{-- <div class="min-h-screen w-[500px] flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-red-100 dark:bg-gray-900"> --}}

    <form method="POST" action="{{ route('register') }}" class="">
        @csrf

        <img src="{{asset('/images/Waste-Logo.png')}}" alt="" class="mb-2 w-24 h-24 rounded object-cover ml-auto mr-auto">

        {{-- <div class="flex justify-start"> --}}
        <!-- First Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />

            <x-text-input id="name" class="block mt-1 w-[225px]"
                            type="text"
                            name="first_name" :value="old('first_name')"
                            required autofocus autocomplete="first_name"
                            placeholder="Enter Your First Name" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div>
            <x-input-label for="last_name" :value="__('First Name')" />

            <x-text-input id="last_name" class="block mt-1 w-[225px]"
                            type="text"
                            name="last_name" :value="old('last_name')"
                            required autofocus autocomplete="last_name"
                            placeholder="Enter Your First Name" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="ml-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-[225px]"
                            type="email"
                            name="email" :value="old('email')"
                            required autocomplete="username"
                            placeholder="Enter Your Email" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Location -->
        <div class="status" style="display: none;"></div>
        <div class="ml-4">
            <x-input-label for="location" :value="__('location')" />
            <textarea id="locationTextarea" rows="4" cols="50"
                      class="block mt-1 w-[225px]"
                      name="location" required autocomplete=""
                      placeholder="Find Your location">{{ old('location') }}</textarea>

            <x-input-error :messages="$errors->get('location')" class="mt-2" />
            <button id="getLocationBtn">Get My Location</button>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-[225px]"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Enter Your Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 ml-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-[225px]"
                            type="password"
                            name="password_confirmation"
                            required autocomplete="new-password"
                            placeholder="Confirm Password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4 bg-green-500 hover:bg-green-700">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
</x-guest-layout>
