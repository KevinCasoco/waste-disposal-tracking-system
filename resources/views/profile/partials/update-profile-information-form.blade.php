<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        @if (Auth::user()->role == 'collector')
        <div>
            <x-input-label for="plate_no" :value="__('Plate No.')" />
            <x-text-input id="plate_no" name="plate_no" type="text" class="mt-1 block w-full" :value="old('plate_no', $user->plate_no)" required autofocus autocomplete="plate_no" />
            <x-input-error class="mt-2" :messages="$errors->get('plate_no')" />
        </div>

        @endif

        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" name="first_name" type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
            <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
        </div>

        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required autofocus autocomplete="last_name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- <div>
            <x-input-label for="role" :value="__('Role')" />
            <x-text-input id="role" name="role" type="text" class="mt-1 block w-full" :value="old('role', $user->role)" readonly required autofocus autocomplete="role"/>
            <x-input-error class="mt-2" :messages="$errors->get('role')" />
        </div> --}}

        @if (Auth::user()->role == 'residents')

        <div>
            <div class="hidden md:block">
            <x-input-label for="number" :value="__('Phone Number')" />
            <x-text-input id="number" name="number" type="tel" class="phone-input mt-1 block-100 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" :value="old('number', $user->number)" style="width: 435px;" required autofocus autocomplete="number"/>
            <x-input-error class="mt-2" :messages="$errors->get('number')" />
            </div>
            <div class="md:hidden">
            <x-input-label for="number" :value="__('Phone Number')" />
            <x-text-input id="number" name="number" type="tel" class="phone-input mt-1 block-100 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" :value="old('number', $user->number)" style="width: 326px;" required autofocus autocomplete="number"/>
            <x-input-error class="mt-2" :messages="$errors->get('number')" />
            </div>
        </div>

        <!-- Location -->
        <div class="status" style="display: none;"></div>
        <div class="mt-1">
            <x-input-label for="location" :value="__('Location')" />
            <x-textarea-input id="locationTextarea" rows="4" cols="50"
                class="block mt-1 w-[100%]" name="location" required autocomplete=""
                placeholder="Find Your Location">{{ old('location', $user->location) }}</x-textarea-input>

            <x-input-error :messages="$errors->get('location')" class="mt-2" />
            <div class="flex justify-end mt-3">
                <i id="getLocationBtn" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Location</i>
            </div>
        </div>

        @endif

        <div class="flex justify-end items-center gap-4">
            <x-primary-button class="w-24 justify-center bg-green-500 hover:bg-green-700">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
