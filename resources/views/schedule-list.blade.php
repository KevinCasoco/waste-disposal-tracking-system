<x-app-layout>
    @if (Auth::user()->role == 'admin')

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
            <ul class="mt-2">
                <li class="mb-1 group">
                    <a href="{{ asset('dashboard') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                        <i class="ri-dashboard-fill mr-3 text-lg"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('admin') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                        <i class="ri-admin-fill mr-3 text-lg"></i>
                        <span class="text-sm">Admin</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('collector') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                        <i class="ri-map-pin-user-fill mr-3 text-lg"></i>
                        <span class="text-sm">Collector</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('residents') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                        <i class="ri-user-fill mr-3 text-lg"></i>
                        <span class="text-sm">Residents</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('schedule') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                        <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                        <span class="text-sm">Calendar Schedule</span>
                    </a>
                </li>
                <li class="mb-1 group active">
                    <a href="{{ asset('schedule-list') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                        <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                        <span class="text-sm">Schedule List</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('admin-trash-bin') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-delete-bin-4-fill mr-3 text-lg"></i>
                        <span class="text-sm">Trash Bin</span>
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
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                <i class="ri-logout-box-line mr-1 text-lg"></i>
                                <span class="text-sm">Logout</span>
                            </a>
                        </form>
                        <div class="absolute mr-[110px] -mb-2">
                            <button onclick="document.getElementById('logoutModal').classList.add('hidden')"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-3 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     <!-- content -->
     <div class="flex-grow text-gray-800">
        <main class="p-3 sm:p-4 space-y-5">
          <!-- Start Table -->
    <div id='recipients' class="p-4 m-1 lg:mt-0 rounded shadow-lg bg-white overflow-x-auto">
        <div class="mb-4 flex sm:justify-center md:justify-start lg:justify-start">
                    <h2 class="text-2xl font-bold">SCHEDULE TABLE INFORMATION</h2>
                </div>

                <div x-data="{ scheduleDelete: false, scheduleEdit: false, newSchedules: false, scheduleToDelete: null, scheduleToEdit: null}">
                    <div class="flex flex-col mb-2 sm:justify-end md:flex-row md:justify-end items-center lg:justify-end">
                    <button @click="newSchedules = true" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm  px-14 py-2.5 md:px-5 md:py-2.5 lg:px-5 lg:py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mb-2 md:mb-0"><i class="ri-add-circle-line mr-1"></i>Add New Schedule</button>
                    <div class="md:flex-shrink-0 mt-[47px]">

                    </div>
                </div>
                <table id="example" class="stripe hover display dataTable " style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>

                        <tr>
                            <th data-priority="1">ID</th>
                            {{-- <th data-priority="2">User Role</th> --}}
                            <th data-priority="3">Plate No</th>
                            <th data-priority="4">Address</th>
                            <th data-priority="5">Date</th>
                            <th data-priority="6">Time</th>
                            <th data-priority="7">Edit</th>
                            <th data-priority="8">Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($data as $item)
                        <tr x-on:click="scheduleToEdit = {{ $item->id }};">
                            <td >{{ $item->id }}</td>
                            {{-- <td >{{ $item->users_id }}</td> --}}
                            <td >{{ $item->plate_no }}</td>
                            <td >{{ $item->location }}</td>
                            <td >{{ $item->start }}</td>
                            <td >{{ $item->time }}</td>
                            <td class="text-center ">
                                <button @click="scheduleEdit = true; scheduleToEdit = $event.target.getAttribute('data-item-id')"
                                data-item-id="{{ $item->id }}" class="py-1 px-4 rounded bg-sky-500 hover:bg-sky-700 text-white"> <i class="ri-edit-box-fill mr-1"></i>Edit
                                </button>
                            </td>
                            <td class="text-center ">
                                <button @click="scheduleDelete = true; scheduleToDelete = $event.target.getAttribute('data-item-id')"
                                data-item-id="{{ $item->id }}" class="py-1 px-4 rounded bg-red-500 hover:bg-red-700 text-white"> <i class="ri-delete-bin-5-fill mr-1"></i>Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- data for pagination xx
                {{ $data->links() }} --}}

                 <!-- Add New Users Modal -->
                 <div x-show="newSchedules" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-30" x-cloak>
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <div x-show="newSchedules" @click.away="newSchedules = false"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="bg-white rounded-lg overflow-hidden transform transition-all flex justify-start">
                        <!-- ... (modal content) ... -->
                        <div class="bg-white py-3 w-full sm:w-[340px] h-full sm:h-[430px]">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white w-full pb-3 ml-5">
                                    Add New Schedule
                                </h3>
                            </div>
                            <hr class="bg-black border-gray-300 w-full">
                            <form action="{{ route('schedule.create') }}" method="post" class="pl-5 pr-5 pt-3 pb-3">
                                @csrf

                                <label for="plate_no" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Plate No:</label>
                                <select name="plate_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white sm:w-full w-[300px]" required>
                                    <option value="">Select Plate Number</option>
                                    @foreach($users as $user)
                                        <option>{{ $user->plate_no }}</option>
                                    @endforeach
                                </select>

                                <label for="location" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Location:</label>
                                    <select id="addressDropdown" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white sm:w-full w-[300px]" required>
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

                                {{-- <label for="label">Please take note that 1 day before the schedule can only notify the users!</label> --}}
                                <label for="location" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Date of Collection:</label>
                                <input type='date' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[300px]" id='start' name='start' required value='{{ now()->toDateString() }}'>

                                <label for="location" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Time of Collection:</label>
                                <input type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[300px]" id="time" name="time" required>

                                <div class="flex justify-end mt-3">
                                    <button type="submit"
                                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Create
                                    </button>
                                </form>
                                <div class="absolute mr-[90px]">
                                <button @click="newSchedules = false"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Cancel
                                </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div x-show="scheduleDelete" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-30" x-cloak>
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <div x-show="scheduleDelete" @click.away="scheduleDelete = false"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="bg-white rounded-lg overflow-hidden transform transition-all flex justify-start">
                        <!-- ... (modal content) ... -->
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-col">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to remove this schedule?</h3>
                            <div class="flex justify-end items-end pb-2">
                            <form method="post" :action="`{{ route('schedule-list.schedule_destroy', '') }}/${scheduleToDelete}`">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Delete
                                </button>
                            </form>
                            <div class="absolute mr-[90px]">
                            <button @click="scheduleDelete = false"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Cancel
                            </button>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div x-show="scheduleEdit" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-30" x-cloak>
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <div x-show="scheduleEdit" @click.away="scheduleEdit = false"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="rounded-lg overflow-hidden transform transition-all flex justify-start">
                        <!-- ... (modal content) ... -->
                        <div class="bg-white py-3 w-full sm:w-[345px] h-full sm:h-[430px]">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white w-full pt-2 pb-3 ml-5">
                                        Edit Schedule Information
                                    </h3>
                                    <button @click="scheduleEdit = false" aria-label="Close" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <hr class="bg-black border-gray-300 w-full">
                                @foreach($data as $item)
                                <div x-show="scheduleToEdit.toString() === '{{ $item->id }}'">
                                    <form method="post" :action="`{{ route('schedule-list.update_schedule', '') }}/${scheduleToEdit}`" class="pl-5 pr-5 pt-2 pb-1">
                                        @csrf
                                        @method('patch')

                                        <label for="plate_no" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Plate No:</label>
                                        <select name="plate_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white sm:w-full w-[300px]" required>
                                            <option value="">Select Plate Number</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->plate_no }}" @if($user->plate_no == $item->plate_no) selected @endif>{{ $user->plate_no }}</option>
                                            @endforeach
                                        </select>

                                        <label for="location" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Location:</label>
                                        <input type="hidden" name="schedule_id" value="{{ $item->id }}">
                                        <select id="addressDropdown" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white sm:w-full w-[300px]" required>
                                            <option value="">Select Address</option>
                                            @foreach($locations as $id => $location)
                                            <?php
                                            // Split the address by commas
                                            $parts = explode(',', $location);
                                            // Extract the second part and remove leading/trailing spaces
                                            $secondValue = trim($parts[1]);
                                            ?>
                                            <option value="{{ $location }}" @if($item->location == $location) selected @endif>{{ $secondValue }}</option>
                                            @endforeach
                                        </select>

                                        <label for="start" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Date of Collection:</label>
                                        <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[300px]" id="start" name="start" value="{{ $item->start }}" required>

                                        <label for="start" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Time of Collection:</label>
                                            <?php
                                            // converting time value into time object
                                            $time = \Carbon\Carbon::createFromFormat('h:i A', $item->time)->format('H:i');
                                            ?>
                                        <input type="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[300px]" id="time" name="time" value="{{ $time }}" required>

                                        <div class="flex justify-end items-end pt-1">
                                            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Update
                                            </button>
                                            <div class="absolute mr-[93px]">
                                                <button @click.prevent="scheduleEdit = false" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @endforeach
                         </div>
                    </div>
                </div>

                </div>
            </div>
            <!--End Table-->
        </main>
         </div>
        </div>
        <!--/container-->

        {{-- Alphine --}}
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

        <script>
            $(document).ready(function() {
                var empDataTable = $('#example').DataTable({
                    responsive: true,
                    dom: 'Blfrtip',
                    buttons: [
                        {
                            extend: 'copy',
                        },
                        {
                            extend: 'pdf',
                            title: 'Waste Disposal Tracking System PDF Report',
                            customize: function(doc) {
                                // Add custom design to PDF header
                                doc.content.splice(0, 1, {
                                    text: 'Waste Disposal Tracking System PDF Report',
                                    style: {
                                        alignment: 'center',
                                        color: 'red', // Change color as needed
                                        fontSize: 16 // Adjust font size as needed
                                    }
                                });
                                 // Set page size and orientation
                                doc.pageSize = 'A4'; // You can change to 'letter' or other sizes
                                doc.pageOrientation = 'portrait'; // 'portrait' or 'landscape'
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5 ] // Specify the column indices you want to export
                            }
                        },
                        // {
                        //     extend: 'csv',
                        //     title: 'Waste Disposal Tracking System CSV Report',
                        //     exportOptions: {
                        //         columns: [0, 1, 2, 3, 4, 5] // Specify the column indices you want to export
                        //     },
                        //     customize: function (csv) {
                        //         // Custom CSV header with a single cell spanning all columns
                        //         var customHeader = 'Waste Disposal Tracking System Report\n';
                        //         return customHeader + csv;
                        //     },
                        // },
                        {
                            extend: 'excel',
                            title: 'Waste Disposal Tracking System Excel Report',
                            customize: function(xlsx) {
                                // // Add custom design to Excel header
                                // var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                // $('row:first c', sheet).attr('s', '32'). // Change the style as needed
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5] // Specify the column indices you want to export
                            }
                        },
                        {
                            extend: 'print', // Add print button
                            title: 'Waste Disposal Tracking System Print Report',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5]
                            }
                        }
                    ]
                });
            });
        </script>

        <script>
            function deleteItem(itemId) {
                // Set the scheduleToDelete value based on the clicked item's ID
                this.scheduleToDelete = itemId;
            }
        </script>

        <script>
            window.addEventListener('DOMContentLoaded', () => {
                Alpine.data('yourComponentName', () => ({
                    collectorEdit: false,
                    scheduleToEdit: null, // Variable to store the selected item
                }));
            });
        </script>

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

        <script>
        // Get the current time in the "HH:mm" format
        var currentTime = new Date().toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit' });

        // Set the current time as the value for the "Time" input
        document.getElementById('time').value = currentTime;
        </script>

        @endif

    </x-app-layout>
