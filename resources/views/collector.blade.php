<x-app-layout>
<x-message/>

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
                <div x-data="{ deleteCollector: false, adminNewCollector: false, collectorEdit: false, itemToDelete: null, itemToEdit: null}">
                    <button @click="adminNewCollector = true">Add New Collector</button>
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
                            <th data-priority="7">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $item)
                        <tr x-on:click="itemToEdit = {{ $item->id }};">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td class="">
                                <button @click="collectorEdit = true; itemToEdit = $event.target.getAttribute('data-item-id')"
                                data-item-id="{{ $item->id }}">Edit
                                </button>
                            </td>
                            <td>
                                <button @click="deleteCollector = true; itemToDelete = $event.target.getAttribute('data-item-id')"
                                data-item-id="{{ $item->id }}">Delete
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
                    class="bg-white rounded-lg overflow-hidden transform transition-all sm:max-w-lg sm:w-full">
                    <!-- ... (modal content) ... -->
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-col sm:items-center">
                        {{-- <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg> --}}
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Register New Collector</h3>
                        <form action="{{ route('collector.create_collector') }}" method="post">
                            @csrf
                            <label for="name">Name:</label>
                            <input type="text" name="name" required>
                            <br>
                            <label for="email">Email:</label>
                            <input type="email" name="email" required>
                            <br>
                            <label for="password">Password:</label>
                            <input type="password" name="password" required>
                            <br>
                            <label for="role">Role:</label>
                                <select name="role" required>
                                    {{-- <option value="admin">Admin</option> --}}
                                    <option value="collector" selected>Collector</option>
                                    {{-- <option value="resident">Resident</option> --}}
                                </select>
                            <br>
                            <label for="status">status:</label>
                            <select name="status" required>
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                                {{-- <option value="resident">Resident</option> --}}
                            </select>
                            <button type="submit"
                                    class="text-white bg-blue-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">
                                Create
                            </button>
                        </form>
                        <button @click="adminNewCollector = false"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Cancel
                        </button>
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
                    class="bg-white rounded-lg overflow-hidden transform transition-all sm:max-w-lg sm:w-full">
                        <!-- ... (modal content) ... -->
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-col sm:items-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this user?</h3>
                            <form method="post" :action="`{{ route('collector.admin_destroy_collector', '') }}/${itemToDelete}`">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Delete
                                </button>
                            </form>
                            <button @click="deleteCollector = false"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Cancel
                            </button>
                        </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div x-show="collectorEdit" class="fixed inset-0 overflow-y-auto flex items-center justify-center" x-cloak>
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
                    class="bg-white rounded-lg overflow-hidden transform transition-all sm:max-w-lg sm:w-full">
                        <!-- ... (modal content) ... -->
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-col sm:items-center">
                            {{-- <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg> --}}
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to update this user?</h3>
                            @foreach($data as $item)
                            <div x-show="itemToEdit === {{ $item->id }}">
                            <form method="post" :action="`{{ route('collector.update_collector', '') }}/${itemToEdit}`">
                                @csrf
                                @method('patch')
                                    <label for="name">ID:</label>
                                    <input type="text" name="id" value="{{ $item->id }}" disabled>
                                    <br>
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" value="{{ $item->name }}" required>
                                    <br>
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" value="{{ $item->email }}" required>
                                    <br>
                                    <label for="role">Role:</label>
                                    <select name="role" required>
                                        <option value="admin" {{ $item->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="collector" {{ $item->role === 'collector' ? 'selected' : '' }}>Collector</option>
                                        <option value="resident" {{ $item->role === 'resident' ? 'selected' : '' }}>Resident</option>
                                    </select>
                                    <br>
                                <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                    Update
                                </button>
                            </form>
                            </div>
                            @endforeach
                            <button @click="collectorEdit = false"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                Cancel
                            </button>
                     </div>
                </div>
            </div>

        </div>
        <!--/Card-->

    </div>
    <!--/container-->

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
