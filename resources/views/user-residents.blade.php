<x-app-layout>
<x-message/>

    @if (Auth::user()->role == 'residents')

    <!-- START SIDEBAR -->
    <div class="fixed left-0 top-0 w-60 h-full bg-white p-4">
    <a class="flex item-center pb-4 border-b border-b-gray-700">
        <img src="{{asset('/images/Waste-Logo.png')}}" alt="" class="w-16 h-16 rounded object-cover">
        <span class="text-lg font-extrabold text-black ml-1">Waste Disposal Tracking System</span>
    </a>

    <ul class="mt-2" >
        <li class="mb-1 group">
            <a href="{{ asset('dashboard')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-dashboard-fill mr-3 text-lg"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>
        {{-- <li class="mb-1 group">
            <a href="{{ asset('admin')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-admin-fill mr-3 text-lg"></i>
                <span class="text-sm">Admin</span>
            </a>
        </li> --}}
        {{-- <li class="mb-1 group">
            <a href="{{ asset('collector')}}"  class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-map-pin-user-fill mr-3 text-lg"></i>
                <span class="text-sm">Collector</span>
            </a>
        </li> --}}
        <li class="mb-1 group active">
            <a href="{{ asset('user-residents')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-user-fill mr-3 text-lg"></i>
                <span class="text-sm">Residents</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="{{ asset('user-schedule')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                <span class="text-sm">Schedule</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="{{ asset('kitchen-waste')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-ink-bottle-line mr-3 text-lg"></i>
                <span class="text-sm">Kitchen Waste</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="{{ asset('recyclable-waste')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-recycle-fill mr-3 text-lg"></i>
                <span class="text-sm">Recyclable Waste</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="{{ asset('hazardous-waste')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-paint-fill mr-3 text-lg"></i>
                <span class="text-sm">Hazardous Waste</span>
            </a>
        </li>
        {{-- <li class="mb-1 group">
            <a href="Settings.html" class="flex items-center py-2 px-4 text-white hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-settings-2-line mr-3 text-lg"></i>
                <span class="text-sm">Settings</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="Login.html" class="flex items-center py-2 px-4 text-white hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                <i class="ri-logout-box-line mr-3 text-lg"></i>
                <span class="text-sm">Logout</span>
            </a>
        </li> --}}
    </ul>
    </div>

    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- END SIDEBAR -->

     <!--Container-->
     <div class="md:w-[calc(100%-240px)] md:ml-60 mx-auto px-2 p-5 bg-slate-200 min-h-screen transition-all main">

        <!-- Start Table -->
        <div id='recipients' class="p-8 m-3 lg:mt-0 rounded shadow-lg bg-white">

            <div x-data="{ residentsDelete: false, userResidentEdit: false, userAddNew: false, itemToEdit: null, itemToDelete: null }">
            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">ID</th>
                        <th data-priority="2">First Name</th>
                        <th data-priority="3">Last Name</th>
                        <th data-priority="4">Email Address</th>
                        {{-- <th data-priority="3">Contact Number</th> --}}
                        {{-- <th data-priority="3">Barangay</th> --}}
                        {{-- <th data-priority="4">Role</th> --}}
                        <th data-priority="5">Address</th>
                        <th data-priority="6">Role</th>
                        {{-- <th data-priority="5">Edit</th>
                        <th data-priority="6">Delete</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr x-on:click="itemToEdit = {{ $item->id }};">
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->role }}</td>
                        {{-- <td class="text-center">
                            <button @click="userResidentEdit = true; itemToEdit = $event.target.getAttribute('data-item-id')"
                                data-item-id="{{ $item->id }}" class="py-1 px-4 rounded bg-sky-500 hover:bg-sky-700 text-white"> <i class="ri-edit-box-fill mr-1"></i>Edit
                            </button>
                        </td>
                        <td class="text-center">
                            <button @click="residentsDelete = true; itemToDelete = $event.target.getAttribute('data-item-id')"
                            data-item-id="{{ $item->id }}"class="py-1 px-4 rounded bg-red-500 hover:bg-red-700 text-white"> <i class="ri-delete-bin-5-fill mr-1"></i>Delete
                        </button>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>

                {{-- Edit Modal --}}
                <div x-show="userResidentEdit" class="fixed inset-0 overflow-y-auto flex items-center justify-center" x-cloak>
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                <div x-show="userResidentEdit" @click.away="userResidentEdit = false"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="rounded-lg overflow-hidden transform transition-all flex justify-start">
                    <!-- ... (modal content) ... -->
                    <div class="bg-white py-3 w-[410px] h-[490px]">
                            {{-- <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg> --}}
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white w-full pt-2 pb-3 ml-5">
                                    Edit Profile
                                </h3>
                            </div>
                            <hr class="bg-black border-gray-300 w-[410px]">
                            @foreach($data as $item)
                            <div x-show="itemToEdit === {{ $item->id }}">
                            <form method="post" :action="`{{ route('user-residents.update_user_residents', '') }}/${itemToEdit}`" class="pl-5 pr-5 pt-2 pb-1">
                                @csrf
                                @method('patch')
                                <label for="name" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">ID:</label>
                                <input type="text" name="id" value="{{ $item->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[370px]" disabled>
                                <label for="name" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Name:</label>
                                <input type="text" name="name" value="{{ $item->name }}" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[370px]" required>

                                <label for="email" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Email:</label>
                                <input type="email" name="email" value="{{ $item->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[370px]" required>

                                    {{-- <label for="password">Password:</label>
                                    <input type="password" name="password">
                                    <br> --}}
                                    <label for="role" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Role:</label>
                                    <select name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[370px]" required>
                                        <option value="admin" {{ $item->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="collector" {{ $item->role === 'collector' ? 'selected' : '' }}>Collector</option>
                                        <option value="resident" selected disabled {{ $item->role === 'resident' ? 'selected' : '' }}>Resident</option>
                                    </select>
                                    <div class="flex justify-end items-end pt-1">
                                        <button type="submit"
                                                class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Update
                                        </button>
                                    <div class="absolute mr-[93px]">
                                        <button @click.prevent="userResidentEdit = false"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
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
        <!--/Card-->

    </div>
    <!--/container-->

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <script>
        function deleteItem(itemId) {
            // Set the itemToDelete value based on the clicked item's ID
            this.itemToDelete = itemId;
        }
    </script>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            Alpine.data('yourComponentName', () => ({
                userResidentEdit: false,
                itemToEdit: null, // Variable to store the selected item
            }));
        });
    </script>

	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable({
					responsive: true
				})
				.columns.adjust()
				.responsive.recalc();
		});
	</script>

@endif

</x-app-layout>
