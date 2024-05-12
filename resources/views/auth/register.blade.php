<x-guest-layout>
    {{-- <div class="min-h-screen w-[500px] flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-red-100 dark:bg-gray-900"> --}}

    <form method="POST" action="{{ route('register') }}" class="">
        @csrf

        <a href="{{ asset('/') }}">
            <img src="{{ asset('/images/Waste-Logo.png') }}" alt=""
                class="mb-2 w-24 h-24 rounded object-cover ml-auto mr-auto">
        </a>

        {{-- <div class="flex justify-start"> --}}
        <!-- First Name -->
        <div class="mt-3">
            <x-input-label for="first_name" :value="__('First Name')" />

            <x-text-input id="name" class="block mt-1 w-[100%]" type="text" name="first_name" :value="old('first_name')"
                required autofocus autocomplete="first_name" placeholder="Enter Your First Name" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-3">
            <x-input-label for="last_name" :value="__('Last Name')" />

            <x-text-input id="last_name" class="block mt-1 w-[100%]" type="text" name="last_name" :value="old('last_name')"
                required autofocus autocomplete="last_name" placeholder="Enter Your Last Name" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-[100%]" type="email" name="email" :value="old('email')"
                required autocomplete="username" placeholder="Enter Your Email" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-3">
            <div id="country-selector"></div>
            <x-input-label for="number" :value="__('Phone Number')" />
            <x-text-input class="w-[113%] md:w-[122%]" id="number" type="tel" name="number" :value="old('number')" required autocomplete="number"
                placeholder="Enter Your Phone Number"/>

            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

        <!-- Location -->
        <div class="status" style="display: none;"></div>
        <div class="mt-3">
            <x-input-label for="location" :value="__('Location')" />
            <x-textarea-input id="locationTextarea" rows="4" cols="50" class="block mt-1 w-[100%] p-3 h-24"
                name="location" required autocomplete=""
                placeholder="Find Your Location">{{ old('location') }}</x-textarea-input>

            <x-input-error :messages="$errors->get('location')" class="mt-2" />
            <div class="flex justify-end mt-2">
                <i id="getLocationBtn"
                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Location</i>
            </div>
        </div>

        <!-- Modal -->
        <div id="locationModal"
            class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-20">
            <div class="bg-white p-6 rounded-lg shadow-xl w-[280px]">
                <p class="mb-4">You have denied access to your location. Please enable location access in your browser
                    settings to use this feature.</p>
                <div class="flex justify-end">
                    <button id="closeModalBtn"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">Close</button>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.getElementById('getLocationBtn').addEventListener('click', function() {
                    if ("geolocation" in navigator) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            // Success - User allowed location access
                            console.log("Latitude: " + position.coords.latitude + " Longitude: " +
                                position.coords.longitude);
                        }, function(error) {
                            // Error - User denied location access
                            console.error("Error getting location:", error);
                            document.getElementById('locationModal').classList.remove('hidden');
                        });
                    } else {
                        // Browser doesn't support geolocation
                        console.error("Geolocation is not supported by this browser.");
                    }
                });

                document.getElementById('closeModalBtn').addEventListener('click', function() {
                    document.getElementById('locationModal').classList.add('hidden');
                });
            });
        </script>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-[100%]" type="password" name="password" required
                autocomplete="new-password" placeholder="Enter Your Password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-3">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-[100%]" type="password"
                name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Modal toggle -->
        <div class="flex items-center mt-3">
            <input id="terms-checkbox" type="checkbox"
                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                required>
            <label for="terms-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                <a href="#" data-modal-toggle="default-modal"
                    class="text-gray-800 hover:underline dark:text-gray-900">I agree to the Terms and Conditions.</a>
            </label>
        </div>

        <!-- Main modal -->
        <div id="default-modal" aria-hidden="true"
            class="hidden overflow-x-hidden overflow-y-auto fixed top-4 md:top-20 inset-x-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-2xl px-4 md:h-full">
                <!-- Modal content -->
                <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white">
                            Terms and Conditions
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="default-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 space-y-4 overflow-y-auto max-h-96 text-justify">
                        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px- p4y-2">
                            <div class="text-gray-500 text-base leading-relaxed dark:text-gray-400">
                                <h2 class="text-gray-900 text-xl lg:text-2xl font-semibold dark:text-white mb-4">
                                    AGREEMENT TO OUR LEGAL TERMS
                                </h2>
                                <p class="mb-2">
                                    These Legal Terms legally binding agreement made between you, whether personally or on behalf of an entity expertise/client, and Developers concerning your access to and use of the Services. You agree that by accessing the Services, you have read, understood, and agreed to be bound by all of these Legal Terms. IF YOU DO NOT AGREE WITH ALL OF THESE LEGAL TERMS, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE WEBSITE AND/OR APPLICATION AND YOU MUST DISCONTINUE USE IMMEDIATELY.
                                </p>
                                <p class="mb-2">
                                    Extra terms and conditions or documents that may be posted on the Website from time to time are hereby expressly incorporated herein by reference. We reserve the right, to make changes to these Legal Terms at any time and for any reason. It is your responsibility to periodically review these Legal Terms to stay informed of updates. You will be subject to, and will be deemed to have been made aware of and to have accepted, the Legal Terms
                                </p>

                                <p class="mb-2">
                                    All users who are minors in which they reside (generally under the age of 18) must have the permission of, and be directly supervised by, their parent or guardian to use the Website and/or Application. If you are a minor, you must have your parent or guardian read and agree to these Legal Terms prior to you using the Website.
                                </p>
                                {{-- <p class="mb-2">
                                    You can contact us by email at wastedisposaltrackingsystem@gmail.com
                                </p>
                                <p class="mb-2">
                                    These Legal Terms legally binding agreement made between you, whether personally or
                                    on
                                    behalf of an entity expertise/client, and Developers concerning your access to and
                                    use of
                                    the Services. You agree that by accessing the Services, you have read, understood,
                                    and
                                    agreed to be bound by all of these Legal Terms. IF YOU DO NOT AGREE WITH ALL OF
                                    THESE LEGAL
                                    TERMS, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE WEBSITE AND/OR APPLICATION
                                    AND YOU
                                    MUST DISCONTINUE USE IMMEDIATELY.
                                </p> --}}
                                {{-- <p class="mb-2">
                                    Extra terms and conditions or documents that may be posted on the Website from time
                                    to time
                                    are hereby expressly incorporated herein by reference. We reserve the right, to make
                                    changes
                                    to these Legal Terms at any time and for any reason. It is your responsibility to
                                    periodically review these Legal Terms to stay informed of updates. You will be
                                    subject to,
                                    and will be deemed to have been made aware of and to have accepted, the Legal Terms
                                </p>
                                <p class="mb-4">
                                    All users who are minors in which they reside (generally under the age of 18) must
                                    have the
                                    permission of, and be directly supervised by, their parent or guardian to use the
                                    Website
                                    and/or Application. If you are a minor, you must have your parent or guardian read
                                    and agree
                                    to these Legal Terms prior to you using the Website.
                                </p> --}}
                                <h3 class="text-gray-900 text-lg font-semibold dark:text-white mb-1">
                                    1. INTELLECTUAL PROPERTY RIGHTS
                                </h3>
                                <p class="mb-2 font-semibold">
                                    Our intellectual property
                                </p>
                                <p class="mb-2">
                                    We are the owner or the licensee of all intellectual property rights in our Website
                                    and
                                    Application, including all source code, databases, functionality, software, website
                                    designs,
                                    video, text, photographs, and graphics in the Services (collectively, the Content),
                                    as well
                                    as the trademarks, service marks, and logos contained therein.
                                </p>
                                <p class="mb-2">
                                    We reserve all rights not expressly granted to you in and to the Website, and
                                    Content.
                                </p>
                                <p class="mb-2 font-semibold">
                                    Your submissions in the Email
                                </p>
                                <p class="mb-2">
                                    Please review this section carefully prior to using our Website and/or Application
                                    to
                                    understand the rights you give us
                                </p>
                                <p class="mb-2">
                                    Submissions: By directly sending us any question, comment, suggestion, idea,
                                    feedback, or
                                    other information about the Website, you agree to assign to us all intellectual
                                    property
                                    rights in such Submission. You agree that we shall own this Submission and be
                                    entitled to
                                    its unrestricted use or otherwise, without acknowledgment or compensation to you.
                                </p>
                                <h3 class="text-gray-900 text-lg font-semibold dark:text-white mb-4">
                                    3. USER REPRESENTATIONS
                                </h3>
                                <p class="mb-2">
                                    By using the Application/Website, you represent that: (1) all registration
                                    information you
                                    submit will be true, accurate, current, and complete; (2) you will maintain the
                                    accuracy of
                                    such information and promptly update such registration information as necessary; (3)
                                    you
                                    have the legal capacity and you agree to comply with these Legal Terms; If you
                                    provide any
                                    information that is untrue, inaccurate, not current, or incomplete, we have the
                                    right to
                                    suspend or terminate your account and refuse any and all current or future use of
                                    the
                                    Services (or any portion thereof).
                                </p>
                                <h3 class="text-gray-900 text-lg font-semibold dark:text-white mb-2">
                                    4. USER REGISTRATION
                                </h3>
                                <p class="mb-2">
                                    You may be required to register to use the Website and/or Application. You agree to
                                    keep
                                    your password confidential and will be responsible for all use of your account and
                                    password.
                                    We reserve the right to remove, reclaim, or change a username you input if we
                                    determine,
                                    that such username is inappropriate, or otherwise objectionable.
                                </p>
                                <h3 class="text-gray-900 text-lg font-semibold dark:text-white mb-2">
                                    5. PRIVACY POLICY
                                </h3>
                                <p class="mb-2">
                                    We care about data privacy and security. By using the Website and/or Application,
                                    you agree
                                    to be bound by our Privacy Policy posted on the Website, which is incorporated into
                                    these
                                    Legal Terms. Please be advised the Website are hosted in the Philippines
                                </p>
                                <h3 class="text-gray-900 text-lg font-semibold dark:text-white mb-2">
                                    6. USER DATA
                                </h3>
                                <p class="mb-2">
                                    We will maintain certain data that you input to the Website and/or Application for
                                    the
                                    purpose of managing the performance of the Website, as well as data relating to your
                                    use of
                                    the Services. Although we perform regular routine backups of data, you are
                                    responsible for
                                    all data that you input or that relates to any activity you have undertaken using
                                    the
                                    Application. You agree that we shall have no liability to you for any loss or
                                    corruption of
                                    any such data, and you hereby waive any right of action against us arising from any
                                    such
                                    loss or corruption of such data.
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex justify-end space-x-2 items-center p-6 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-toggle="default-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">Decline</button>
                            <button data-modal-toggle="default-modal" type="button" id="acceptButton"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            I accept
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Get the modal container
            const modalContainer = document.getElementById('default-modal');

            // Get the modal background
            const modalBackground = document.querySelector('.fixed.top-4');

            // Get the checkbox
            const termsCheckbox = document.getElementById('terms-checkbox');

            // Function to handle accept button click
            const handleAcceptButtonClick = () => {
                // Check the checkbox
                termsCheckbox.checked = true;
                // Clear the modal body content
                const modalBody = modalContainer.querySelector('.p-4');
                modalBody.innerHTML = ''; // Clear the inner HTML content
                // Hide the modal container and background
                modalContainer.classList.add('hidden');
                modalBackground.classList.add('hidden');
            };

            // Add an event listener to the accept button
            const acceptButton = document.getElementById('acceptButton');
            acceptButton.addEventListener('click', handleAcceptButtonClick);

            // Add an event listener to the "Terms and Condition" link to toggle the modal
            const modalToggleLink = document.querySelector('[data-modal-toggle="default-modal"]');
            modalToggleLink.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent the default link behavior
                modalContainer.classList.toggle('hidden');
                modalBackground.classList.toggle('hidden');
            });

            // Hide the modal container and background on page load
            document.addEventListener('DOMContentLoaded', () => {
                modalContainer.classList.add('hidden');
                modalBackground.classList.add('hidden');
            });
        </script>

        <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
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
