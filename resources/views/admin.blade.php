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
                <a href="{{ asset('dashboard')}}"  class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                      <i class="ri-dashboard-fill mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li class="mb-1 group">
                <li class="mb-1 group active">
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
    <div class="md:w-[calc(100%-256px)] md:ml-64 xl:w-[79.7%] mx-auto px-2 p-5 bg-gray-100">

        <!-- Start Table -->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

            <div x-data="{ adminDelete: false, adminEdit: false, adminNewUsers: false, itemToDelete: null, itemToEdit: null}">
                <div class="relative flex justify-end mb-2 ">
                <button @click="adminNewUsers = true" class="text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"> <i class="ri-add-circle-line mr-1"></i>Add New User</button>
            </div>
            <table id="example" class="stripe hover display dataTable" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>

                    <tr>
                        <th data-priority="1">ID</th>
                        <th data-priority="2">Full Name</th>
                        <th data-priority="3">Email Address</th>
                        {{-- <th data-priority="3">Contact Number</th> --}}
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
                        <td class="text-center ">
                            <button @click="adminEdit = true; itemToEdit = $event.target.getAttribute('data-item-id')"
                            data-item-id="{{ $item->id }}" class="py-1 px-4 rounded bg-sky-500 hover:bg-sky-700 text-white"> <i class="ri-edit-box-fill mr-1"></i>Edit
                            </button>
                        </td>
                        <td class="text-center">
                            <button @click="adminDelete = true; itemToDelete = $event.target.getAttribute('data-item-id')"
                            data-item-id="{{ $item->id }}" class="py-1 px-4 rounded bg-red-500 hover:bg-red-700 text-white"> <i class="ri-delete-bin-5-fill mr-1"></i>Delete
                            </button>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.toggleUserStatus', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                class='py-1 px-4 rounded
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
             <div x-show="adminNewUsers" class="fixed inset-0 overflow-y-auto flex items-center justify-center" x-cloak>
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <div x-show="adminNewUsers" @click.away="adminNewUsers = false"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="bg-white rounded-lg overflow-hidden transform transition-all flex justify-start">
                    <!-- ... (modal content) ... -->
                    <div class="bg-white py-3 w-[410px] h-[485px]">
                        {{-- <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg> --}}
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white w-full pb-3 ml-5">
                                Register New User
                            </h3>
                        </div>
                        <hr class="bg-black border-gray-300 w-[410px]">
                        <form action="{{ route('admin.create_admin') }}" method="post" class="pl-5 pr-5 pt-3 pb-3">
                            @csrf
                            <label for="name" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Name:</label>
                            <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-[370px]" required>

                            <label for="email" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Email:</label>
                            <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-[370px]" required>

                            <label for="password" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Password:</label>
                            <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mb-2 w-[370px]" required>

                            <label for="role" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Role:</label>
                                <select name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[370px] mb-2" required>
                                    <option value="admin">Admin</option>
                                    <option value="collector">Collector</option>
                                    {{-- <option value="resident">Resident</option> --}}
                                </select>

                            <label for="status" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Status:</label>
                            <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[370px]" required>
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                                {{-- <option value="resident">Resident</option> --}}
                            </select>
                        <div class="flex justify-end mt-3">
                            <button type="submit"
                                    class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Create
                            </button>
                        </form>
                        <div class="absolute mr-[90px]">
                        <button @click="adminNewUsers = false"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Cancel
                        </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div x-show="adminDelete" class="fixed inset-0 overflow-y-auto flex items-center justify-center" x-cloak>
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <div x-show="adminDelete" @click.away="adminDelete = false"
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
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this user?</h3>
                        <div class="flex justify-end items-end pb-2">
                        <form method="post" :action="`{{ route('admin.destroy', '') }}/${itemToDelete}`">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Delete
                            </button>
                        </form>
                        <div class="absolute mr-[90px]">
                        <button @click="adminDelete = false"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Cancel
                        </button>
                    </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div x-show="adminEdit" class="fixed inset-0 overflow-y-auto flex items-center justify-center" x-cloak>
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <div x-show="adminEdit" @click.away="adminEdit = false"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-95"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-95"
                    class="rounded-lg overflow-hidden transform transition-all flex justify-start">
                    <!-- ... (modal content) ... -->
                    <div class="bg-white py-3 w-[410px] h-[425px]">
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
                            <form method="post" :action="`{{ route('admin.update', '') }}/${itemToEdit}`" class="pl-5 pr-5 pt-2 pb-1">
                                @csrf
                                @method('patch')
                                    <label for="name" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">ID:</label>
                                    <input type="text" name="id" value="{{ $item->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[370px]" disabled>
                                    <label for="name" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Name:</label>
                                    <input type="text" name="name" value="{{ $item->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[370px]" required>

                                    <label for="email" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Email:</label>
                                    <input type="email" name="email" value="{{ $item->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-2 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[370px]" required>

                                    {{-- <label for="password">Password:</label>
                                    <input type="password" name="password">
                                    <br> --}}
                                    <label for="role" class="text-gray-800 block mb-1 font-bold text-sm tracking-wide">Role:</label>
                                    <select name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-[370px]" required>
                                        <option value="admin" {{ $item->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="collector" {{ $item->role === 'collector' ? 'selected' : '' }}>Collector</option>
                                        <option value="resident" {{ $item->role === 'resident' ? 'selected' : '' }}>Resident</option>
                                    </select>
                                <div class="flex justify-end items-end pt-1">
                                <button type="submit"
                                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Update
                                </button>
                                <div class="absolute mr-[93px]">
                                    <button @click.prevent="adminEdit = false"
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
        <!--End Table-->

    </div>
    <!--/container-->

    <!-- Datatable CSS -->
    <link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>

    <style type="text/css">
    .dt-buttons{
    width: 86%;
    position: relative;
    margin-bottom: 10px;
    margin-top: -50px;

    }
    button.dt-button {
        background-color: #22C55E;
        color: white;
        border: 1px solid;
        border-radius: 11px;
        height: 42px;

        transition: background-color 0.3s ease; /* Add a smooth transition effect */

    }

    button.dt-button:hover {
        background-color: #1c9d4b; /* Change the background color on hover */
    }

    </style>

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    {{-- Export-Files-Buttons --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    {{-- Alphine --}}
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
                collectorEdit: false,
                itemToEdit: null, // Variable to store the selected item
            }));
        });
    </script>

    {{-- <script>
        $(document).ready(function() {

            var table = $('#example').DataTable({
                    responsive: true
                })
                .columns.adjust()
                .responsive.recalc();
        });

        // export to pdf, excel, word and txt WIP

        // $(document).ready(function() {
        // $('#example').DataTable( {
        //         dom: 'Bfrtip',
        //         buttons: [
        //             'copy', 'csv', 'excel', 'pdf', 'print'
        //         ]
        //     } );
        // } );

 </script> --}}

<!-- Script -->
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
                        exportOptions: {
                            columns: [0, 1] // Column index which needs to export
                        }
                    },
                    {
                        extend: 'csv',
                    },
                    {
                        extend: 'excel',
                    }
                ]
            });
        });
    </script>

    @endif

</x-app-layout>
