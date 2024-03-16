<x-app-layout>
    <x-message/>

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
                    <li class="mb-1 group active">
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
                    <li class="mb-1 group">
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

            <!-- content -->
            <div class="flex-grow text-gray-800">
                <main class="p-3 sm:p-4 space-y-5">
                  <!-- Start Table -->
                  <div id='recipients' class="p-4 m-1 lg:mt-0 rounded shadow-lg bg-white overflow-x-auto">
                    <div class="mb-4 flex sm:justify-center md:justify-start lg:justify-start">
                        <h2 class="text-2xl font-bold">COLLECTOR TABLE INFORMATION</h2>
                    </div>

                    <div x-data="{ deleteCollector: false, adminNewCollector: false, collectorEdit: false, itemToDelete: null, itemToEdit: null}">
                        <div class="flex flex-col mb-2 sm:justify-end md:flex-row md:justify-end items-center lg:justify-end">
                            <button @click="adminNewCollector = true" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm  px-14 py-2.5 md:px-5 md:py-2.5 lg:px-5 lg:py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mb-2 md:mb-0"> <i class="ri-add-circle-line mr-1"></i>Add New Collector</button>
                            <div class="md:flex-shrink-0 mt-[47px]">

                            </div>
                        </div>
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th data-priority="1">Plate No.</th>
                                <th data-priority="2">First Name</th>
                                <th data-priority="3">Last Name</th>
                                <th data-priority="4">Email Address</th>
                                <th data-priority="5">Role</th>
                                <th data-priority="6">Edit</th>
                                <th data-priority="7">Delete</th>
                                <th data-priority="8">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($data as $item)
                            <tr x-on:click="itemToEdit = {{ $item->id }};">
                                <td>{{ $item->plate_no }}</td>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td class="text-center">
                                    <button @click="collectorEdit = true; itemToEdit = $event.target.getAttribute('data-item-id')"
                                    data-item-id="{{ $item->id }}" class="py-1 px-4 rounded bg-sky-500 hover:bg-sky-700 text-white"> <i class="ri-edit-box-fill mr-1"></i>Edit
                                </button>
                                </td>
                                <td class="text-center">
                                    <button @click="deleteCollector = true; itemToDelete = $event.target.getAttribute('data-item-id')"
                                    data-item-id="{{ $item->id }}" class="py-1 px-4 rounded bg-red-500 hover:bg-red-700 text-white"> <i class="ri-delete-bin-5-fill mr-1"></i>Delete
                                </button>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('collector.toggleCollectorStatus', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                        class='py-2 px-4 rounded
                                        @if ($item->status == 'active')
                                            bg-green-500 hover:bg-green-700 text-white
                                        @else
                                            bg-red-500 hover:bg-red-700 text-white
                                        @endif'>
                                        @if ($item->status == 'active')
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- data for pagination xx
                    {{ $data->links() }} --}}

                 <!-- Add New Users Modal -->
                 <div x-show="adminNewCollector" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-30" x-cloak>
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <div x-show="adminNewCollector" @click.away="adminNewCollector = false"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="bg-white rounded-lg overflow-hidden transform transition-all flex justify-start">
                        <div class="bg-white py-3 w-full sm:w-[655px] h-full sm:h-[355px]">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white w-full pb-2 ml-5">
                                    Register New Collector
                                </h3>
                            </div>
                            <hr class="bg-black border-gray-300 w-full">
                            <form action="{{ route('collector.create_collector') }}" method="post" class="flex flex-col sm:flex-row justify-start pl-5 pr-5 pt-2 pb-1">
                                @csrf
                                <div class="sm:mr-4">
                                <label for="plate_no" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Plate No.</label>
                                <input type="text" name="plate_no" pattern="[0-9A-Z]{7}" title="Please enter a valid plate number (e.g., 8KH2Z9)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-full sm:w-[300px]" required>

                                <label for="first_name" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">First Name:</label>
                                <input type="text" name="first_name" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-full sm:w-[300px]" required>

                                <label for="last_name" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Last Name:</label>
                                <input type="text" name="last_name" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2  w-full sm:w-[300px]" required>

                                <label for="email" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Email:</label>
                                <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-full sm:w-[300px]" required>
                                </div>
                                <div>
                                <label for="password" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Password:</label>
                                <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-full sm:w-[300px]" required>


                                <label for="role" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Role:</label>
                                    <select name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[300px] mb-2" required>
                                        {{-- <option value="admin">Admin</option> --}}
                                        <option value="collector" selected>Collector</option>
                                        {{-- <option value="resident">Resident</option> --}}
                                </select>

                                <label for="status" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Status:</label>
                                <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[300px]" required>
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                    {{-- <option value="resident">Resident</option> --}}
                                </select>

                                <div class="flex flex-col sm:flex-row items-end sm:items-center justify-end sm:mt-4 md:mt-4 mt-4">
                                <button type="submit"
                                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Create
                                </button>

                            <div class="absolute mr-[90px]">
                            <button @click="adminNewCollector = false"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Cancel
                            </button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


                <!-- Delete Modal -->
                <div x-show="deleteCollector" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-30" x-cloak>
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <div x-show="deleteCollector" @click.away="deleteCollector = false"
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
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this collector?</h3>
                                <div class="flex justify-end items-end pb-2">
                                <form method="post" :action="`{{ route('collector.admin_destroy_collector', '') }}/${itemToDelete}`">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Delete
                                    </button>
                                </form>
                                <div class="absolute mr-[90px]">
                                <button @click="deleteCollector = false"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Cancel
                                </button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div x-show="collectorEdit" class="fixed inset-0 overflow-y-auto flex items-center justify-center z-30" x-cloak>
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <div x-show="collectorEdit" @click.away="collectorEdit = false"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="rounded-lg overflow-hidden transform transition-all flex justify-start mx-3">
                        <!-- ... (modal content) ... -->
                        <div class="bg-white py-3 w-full sm:w-[655px] h-full sm:h-[380px]">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white w-full pt-2 pb-3 ml-5">
                                        Edit Collector Information
                                    </h3>
                                    <button @click="collectorEdit = false" aria-label="Close" class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <hr class="bg-black border-gray-300 w-full">
                                @foreach($data as $item)
                                <div x-show="itemToEdit.toString() === '{{ $item->id }}'">
                                <form method="post" :action="`{{ route('collector.update_collector', '') }}/${itemToEdit}`" class="flex flex-col sm:flex-row justify-start pl-5 pr-5 pt-3 pb-1">
                                    @csrf
                                    @method('patch')
                                    <div class="md:mr-4 mb-3 sm:mb-0">
                                    <label for="id" class="text-gray-800 block mb-2 font-bold text-sm tracking-wide">ID:</label>
                                    <input type="number" name="id" value="{{ $item->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white  w-full sm:w-[300px]" disabled>

                                    <label for="plate_no" class="text-gray-800 block mb-2 font-bold text-sm tracking-wide">Plate No.</label>
                                    <input type="text" name="plate_no" pattern="[0-9A-Z]{7}" title="Please enter a valid plate number (e.g., 8KH2Z9)" value="{{ $item->plate_no }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-full sm:w-[300px]">

                                    <label for="first_name" class="text-gray-800 block mb-2 font-bold text-sm tracking-wide">First Name:</label>
                                    <input type="text" name="first_name" value="{{ $item->first_name }}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3 w-full sm:w-[300px]" required>
                                    </div>

                                    <div class="mt-1">
                                    <label for="last_name" class="text-gray-800 block mb-2 font-bold text-sm tracking-wide">Last Name:</label>
                                    <input type="text" name="last_name" value="{{ $item->last_name }}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-[300px]" required>

                                    <label for="email" class="text-gray-800 block mb-2 font-bold text-sm tracking-wide">Email:</label>
                                    <input type="email" name="email" value="{{ $item->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-full md:w-[300px]" required>

                                    <label for="role" class="text-gray-800 block mb-2 font-bold text-sm tracking-wide">Role:</label>
                                    <select name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[300px]" required disabled>
                                        {{-- <option value="admin" {{ $item->role === 'admin' ? 'selected' : '' }}>Admin</option> --}}
                                        <option value="collector" {{ $item->role === 'collector' ? 'selected' : '' }}>Collector</option>
                                        <option value="resident" {{ $item->role === 'resident' ? 'selected' : '' }}>Resident</option>
                                    </select>

                                    {{-- <label for="status" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Status:</label>
                                    <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[300px]" required>
                                        <option value="active" {{ $item->status === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $item->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select> --}}



                                    <div class="flex flex-col sm:flex-row items-end sm:items-center justify-end sm:mt-4 md:mt-5 gap-x-2">
                                        <button @click.prevent="collectorEdit = false"
                                            class="cancel-button text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 w-full sm:w-auto mt-4 sm:mt-0 ">
                                            Cancel
                                        </button>
                                        <button type="submit"
                                            class="update-button text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center justify-center px-5 py-2.5 sm:mb-0 w-full sm:w-auto mt-3 sm:mt-0">
                                            Update
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

            </div>
            <!--/Card-->
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
                                columns: [0, 1, 2, 3, 4, 7] // Specify the column indices you want to export
                            }
                        },
                        {
                            extend: 'csv',
                            title: 'Waste Disposal Tracking System CSV Report',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 7] // Specify the column indices you want to export
                            },
                            customize: function (csv) {
                                // Custom CSV header with a single cell spanning all columns
                                var customHeader = 'Waste Disposal Tracking System Report\n';
                                return customHeader + csv;
                            },
                        },
                        {
                            extend: 'excel',
                            title: 'Waste Disposal Tracking System Excel Report',
                            customize: function(xlsx) {
                                // // Add custom design to Excel header
                                // var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                // $('row:first c', sheet).attr('s', '32'). // Change the style as needed
                            },
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 7] // Specify the column indices you want to export
                            }
                        },
                        {
                            extend: 'print', // Add print button
                            title: 'Waste Disposal Tracking System Print Report',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 7]
                            }
                        }
                    ]
                });
            });
        </script>

        <script>
            function deleteItem(itemId) {
                // Set the itemToDelete value based on the clicked item's ID
                this.itemToDelete = itemId;
            }
        </script>

        <script>
            window.addEventListener('DOMContentLoaded', () => {
                Alpine.data('yourComponentName', () => ({
                    collectorEdit: false,
                    itemToEdit: null, // Variable to store the selected item
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

    @endif

    </x-app-layout>
