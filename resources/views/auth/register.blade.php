<x-guest-layout>
    {{-- <div class="min-h-screen w-[500px] flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-red-100 dark:bg-gray-900"> --}}

    <form method="POST" action="{{ route('register') }}" class="">
        @csrf

        <img src="{{asset('/images/Waste-Logo.png')}}" alt="" class="mb-2 w-24 h-24 rounded object-cover ml-auto mr-auto">

    <div class="flex justify-start">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />

            <x-text-input id="name" class="block mt-1 w-[225px]"
                            type="text"
                            name="name" :value="old('name')"
                            required autofocus autocomplete="name"
                            placeholder="Enter Your Full Name" />

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
    </div>

    <div class="flex justify-start">
        {{-- <!-- Region --> --}}
        <div class="mt-4">
            <x-input-label for="region" :value="__('Region')" />
            <select id="region" name="region" class="block mt-1 w-[225px] rounded-lg" required>
                <option value="region" disabled selected>Select Region</option>
            </select>

            <x-input-error :messages="$errors->get('region')" class="mt-2" />
        </div>

        {{-- <!-- Province --> --}}
        <div class="mt-4 ml-4">
            <x-input-label for="Province" :value="__('Province')" />
            <select id="province" name="province" class="block mt-1 w-[225px] rounded-lg" required>
                <option value="province" disabled selected>Select Province</option>
            </select>

            <x-input-error :messages="$errors->get('province')" class="mt-2" />
        </div>
    </div>

    <div class="flex justify-start">
        {{-- <!-- City --> --}}
        <div class="mt-4">
            <x-input-label for="region" :value="__('Region')" />
            <select id="city" name="city" class="block mt-1 w-[225px] rounded-lg" required>
                <option value="city" disabled selected>Select Region</option>
            </select>

            <x-input-error :messages="$errors->get('region')" class="mt-2" />
        </div>

        {{-- <!-- Barangay --> --}}
        <div class="mt-4 ml-4">
            <x-input-label for="Barangay" :value="__('Barangay')" />
            <select id="barangay" name="barangay" class="block mt-1 w-[225px] rounded-lg" required>
                <option value="barangay" disabled selected>Select Barangay</option>
            </select>

            <x-input-error :messages="$errors->get('barangay')" class="mt-2" />
        </div>
    </div>

    <div class="flex justify-start">
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
