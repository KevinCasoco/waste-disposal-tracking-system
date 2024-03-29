<x-guest-layout>
    {{-- <div class="min-h-screen w-[500px] flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-red-100 dark:bg-gray-900"> --}}

    <form method="POST" action="{{ route('register') }}" class="">
        @csrf

        <a href="{{ asset('/') }}" >
            <img src="{{asset('/images/Waste-Logo.png')}}" alt="" class="mb-2 w-24 h-24 rounded object-cover ml-auto mr-auto">
        </a>

        {{-- <div class="flex justify-start"> --}}
        <!-- First Name -->
        <div class="mt-3">
            <x-input-label for="first_name" :value="__('First Name')" />

            <x-text-input id="name" class="block mt-1 w-[100%]"
                            type="text"
                            name="first_name" :value="old('first_name')"
                            required autofocus autocomplete="first_name"
                            placeholder="Enter Your First Name" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-3">
            <x-input-label for="last_name" :value="__('Last Name')" />

            <x-text-input id="last_name" class="block mt-1 w-[100%]"
                            type="text"
                            name="last_name" :value="old('last_name')"
                            required autofocus autocomplete="last_name"
                            placeholder="Enter Your Last Name" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-[100%]"
                            type="email"
                            name="email" :value="old('email')"
                            required autocomplete="username"
                            placeholder="Enter Your Email" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-3">
            <div id="country-selector"></div>
            <x-input-label for="number" :value="__('Phone Number')" />
            <x-text-input id="number"
                            type="tel"
                            name="number" :value="old('number')"
                            required autocomplete="number"
                            placeholder="Enter Your Phone Number" />

            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

        <!-- Location -->
        <div class="status" style="display: none;"></div>
        <div class="mt-3">
            <x-input-label for="location" :value="__('Location')" />
            <x-textarea-input id="locationTextarea" rows="4" cols="50"
                      class="block mt-1 w-[100%]"
                      name="location" required autocomplete=""
                      placeholder="Find Your Location">{{ old('location') }}</x-textarea-input>

            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        <div class="flex justify-end mt-2">
            <i id="getLocationBtn" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Location</i>
        </div>
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-[100%]"
                            type="password"
                            name="password"
                            required autocomplete="new-password"
                            placeholder="Enter Your Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-[100%]"
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
