<x-app-layout>
    @if (Auth::user()->role == 'collector')

    <div class="relative min-h-screen md:flex">

        <!-- mobile menu bar -->
        <div class="bg-white text-black flex justify-end md:hidden">

          <!-- mobile menu button -->
          <button class="mobile-menu-button p-4 focus:outline-none focus:bg-white">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>

        <!-- sidebar -->
        <div class="sidebar bg-white text-black w-64 space-y-6 py-1 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20">

        <!-- nav -->
        <nav>
       <ul class="mt-2" >
        <li class="mb-1 group">
            <a href="{{ asset('dashboard')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-dashboard-fill mr-3 text-lg"></i>
                   <span class="text-sm">Dashboard</span>
               </a>
           </li>
           <li class="mb-1 group">
               <a href="{{ asset('admin')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                   <i class="ri-admin-fill mr-3 text-lg"></i>
                   <span class="text-sm">Admin</span>
               </a>
           </li>
           <li class="mb-1 group">
               <a href="{{ asset('collector')}}"  class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                   <i class="ri-map-pin-user-fill mr-3 text-lg"></i>
                   <span class="text-sm">Collector</span>
               </a>
           </li>
           <li class="mb-1 group">
               <a href="{{ asset('residents')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                   <i class="ri-user-fill mr-3 text-lg"></i>
                   <span class="text-sm">Residents</span>
               </a>
           </li>
           <li class="mb-1 group active">
            <a href="{{ asset('collector-schedule')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                <span class="text-sm">Calendar Schedule</span>
            </a>
            </li>
            <li class="mb-1 group">
                <a href="{{ asset('collector-schedule-list') }}"
                    class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                    <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                    <span class="text-sm">Schedule List</span>
                </a>
            </li>
           <li class="mb-1 group">
            <a href="{{ asset('profile') }}"
                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                <i class="ri-user-settings-line mr-3 text-lg"></i>
                <span class="text-sm">Profile</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a onclick="document.getElementById('logoutModal').classList.remove('hidden')"
                class="flex items-center py-2 px-4 text-black hover:bg-red-500 hover:text-gray-100 rounded-md group-[.active]:bg-red-500 group-[.active]:text-white group-[.selected]:bg-red500 group-[.selected]:text-white transition duration-200">
                    <i class="ri-logout-box-line mr-3 text-lg"></i>
                <span class="text-sm">Logout</span>
            </a>
        </li>
       </ul>
       </nav>
   </div>

    <!-- Logout Modal -->
    <div id="logoutModal" class="hidden fixed inset-0 overflow-y-auto flex items-center justify-center z-30">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden transform transition-all flex justify-end p-2">
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-col">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to logout?</h3>
                <div class="flex justify-end items-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-3 text-center">
                            <i class="ri-logout-box-line mr-1 text-lg"></i>
                            <span class="text-sm">Logout</span>
                        </a>
                    </form>
                    <div class="absolute mr-[100px] -mb-2.5">
                        <button onclick="document.getElementById('logoutModal').classList.add('hidden')"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-3 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form">
        <form action="{{ route('collector-schedule.create_collector') }}" method="POST">
            @csrf
            <div class="bg-white rounded-xl shadow-xl border-solid my-5 py-0.5 pb-10 px-5 mx-auto w-full sm:w-[450px] h-full sm:h-[450px]">
            <h1 class="mt-6 text-2xl font-bold text-center">Waste Collection Schedule</h1>

            <label for="plate_no" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Plate No:</label>
                                <select name="plate_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white sm:w-full" required>
                                    <option value="">Select Plate Number</option>
                                    @foreach($users as $user)
                                        <option>{{ $user->plate_no }}</option>
                                    @endforeach
                                </select>

            <label for='location'>{{ __('Location') }}</label>
                <select id="addressDropdown" name="location" required>
                    <option value="">Select Address</option>
                    @foreach($locations as $id => $location)
                        <?php
                            // Split the address by commas
                            $parts = explode(',', $location);
                            // Extract the second part and remove leading/trailing spaces
                            $secondValue = trim($parts[1]);
                        ?>
                        <option value="{{ $location }}">{{ $secondValue }}</option>
                    @endforeach
                </select>

            <script>
                // Function to extract the second value from an address
                function extractSecondValue(address) {
                    // Split the address by commas
                    var parts = address.split(',');
                    // Extract the second part and remove leading/trailing spaces
                    var secondValue = parts[1].trim();
                    return secondValue;
                }

                // Extract second values from the addresses
                var value1 = extractSecondValue(address1);

                // Add extracted values to the dropdown list
                var dropdown = document.getElementById("addressDropdown");
                var option1 = document.createElement("option");
                option1.text = value1;
                option1.value = value1;
                dropdown.add(option1);
            </script>

            {{-- <label for="label">Please take note that 1 day before the schedule can only notify the users!</label> --}}

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                <div>
                    <label for="start">Date of Collection</label>
                    <input type='date' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" id='start' name='start' required value='{{ now()->toDateString() }}'>
                </div>

                <div>
                    <label for="time">Time of Collection</label>
                    <input type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" id="time" name="time" required>
                </div>
            </div>

            <script>
            // Get the current time in the "HH:mm" format
            var currentTime = new Date().toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit' });

            // Set the current time as the value for the "Time" input
            document.getElementById('time').value = currentTime;
            </script>

            <button type="submit" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 w-full mt-6">Save</button>
        </form>
    </div>

      <!-- Create Schedule Design -->
        <style>
            .form {
                width: 100%;
                max-width: 500px;
                margin: 0 auto;
            }

            label {
                display: block;
                margin-top: 20px;
            }

            input,
            select,
            textarea {
                width: 100%;
                padding: 10px;
                margin-top: 5px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            input[type="submit"] {
                margin-top: 20px;
                background-color: green;
                color: white;
            }

        </style>

    <script>
        // grab everything we need
        const btn = document.querySelector(".mobile-menu-button");
        const sidebar = document.querySelector(".sidebar");
        let isSidebarOpen = false;

        // add our event listener for the click
        btn.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
        });
    </script>

@endif

</x-app-layout>
