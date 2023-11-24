<x-app-layout>
    @if (Auth::user()->role == 'admin')

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
           <li class="mb-1 group">
               <a href="{{ asset('admin')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                   <i class="ri-admin-fill mr-3 text-lg"></i>
                   <span class="text-sm">Admin</span>
               </a>
           </li>
           <li class="mb-1 group active">
            <a href="{{ asset('collector')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
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
           <li class="mb-1 group">
               <a href="{{ asset('schedule')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                   <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                   <span class="text-sm">Schedule</span>
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
    <div class=" md:w-[calc(100%-256px)] md:ml-64 xl:w-[79%] mx-auto px-2 p-5 bg-gray-100">

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                <div x-data="{ deleteCollector: false, adminNewCollector: false, itemToDelete: null}">
                    <div class="relative flex justify-end mb-2 ">
                    <button @click="adminNewCollector = true" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" > <i class="ri-add-circle-line mr-1"></i>Add New User</button>
                    </div>
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">ID</th>
                            <th data-priority="2">Email Address</th>
                            {{-- <th data-priority="3">Contact Number</th> --}}
                            <th data-priority="3">Full Name</th>
                            <th data-priority="4">Role</th>
                            <th data-priority="5">Edit</th>
                            <th data-priority="6">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td class="text-center">
                                <button id="" class="w-7 h-6"><i class="ri-edit-box-fill text-sky-500"></i>
                            </td>
                           <td class="text-center">
                                <button @click="deleteCollector = true; itemToDelete = $event.target.getAttribute('data-item-id')"
                                data-item-id="{{ $item->id }}" class="w-7 h-6"><i class="ri-delete-bin-5-fill text-red-600"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

             <!-- Add New Users Modal -->
             <div x-show="adminNewCollector" class="fixed inset-0 overflow-y-auto flex items-center justify-center" x-cloak>
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
                    <!-- ... (modal content) ... -->
                    <div class="bg-white py-3 w-[410px] h-[430px]">
                        {{-- <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg> --}}
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white w-full pb-3 ml-5">
                                Register New Collector
                            </h3>
                        </div>
                        <hr class="bg-black border-gray-300 w-[410px]">
                        <form action="{{ route('collector.create_collector') }}" method="post" class="pl-5 pr-5 pt-3 pb-3">
                            @csrf
                            <label for="name" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Name:</label>
                            <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3 w-[370px]" required>

                            <label for="email" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Email:</label>
                            <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3 w-[370px]" required>

                            <label for="password"  class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Password:</label>
                            <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-3 w-[370px]" required>

                            <label for="role" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Role:</label>
                                <select name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[370px]" required>
                                    {{-- <option value="admin">Admin</option> --}}
                                    <option value="collector" selected>Collector</option>
                                    {{-- <option value="resident">Resident</option> --}}
                                </select>

                        </form>
                        <div class="flex justify-end pr-5 mt-1">
                        <button @click="adminNewCollector = false"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-2">
                            Cancel
                        </button>
                        <button type="submit"
                             class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Create
                    </button>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div x-show="deleteCollector" class="fixed inset-0 overflow-y-auto flex items-center justify-center" x-cloak>
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
                    class="rounded-lg overflow-hidden transform transition-all flex justify-start">
                        <!-- ... (modal content) ... -->
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-col">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this user?</h3>

                            <div class="flex justify-end items-end pb-2">
                            <button @click="deleteCollector = false"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 mr-2">
                                Cancel
                            </button>
                            <form method="post" :action="`{{ route('collector.admin_destroy_collector', '') }}/${itemToDelete}`">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Card-->


            </div>
        </div>
        <!--End Table-->

    <script>
        function deleteItem() {
            // Set the itemToDelete value based on the clicked item's ID
            this.itemToDelete = {{ $item->id }};
        }
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
