<x-app-layout>
    @if (Auth::user()->role == 'collector')

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
            <a href="{{ asset('editor-residents')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                   <i class="ri-user-fill mr-3 text-lg"></i>
                <span class="text-sm">Residents</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="{{ asset('editor-sched')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                <span class="text-sm">Schedule</span>
            </a>
        </li>
        <li class="mb-1 group">
            <a href="#" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-camera-fill mr-3 text-lg"></i>
                <span class="text-sm">Camera</span>
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

            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">Fullname</th>
                        <th data-priority="2">Email</th>
                        <th data-priority="3">Contact number</th>
                        <th data-priority="4">Barangay</th>
                        <th data-priority="5">Action</th>
                        <th data-priority="6">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jay-ar Grifaldea</td>
                        <td>grifaldea@gmail.com</td>
                        <td>09122680523</td>
                        <td class="text-center">178</td>
                        <td class="text-sky-500 text-center">Edit</td>
                        <td class="text-red-500">Delete</td>
                    </tr>

                    <tr>
                        <td>Carlo Delos</td>
                        <td>carlo@gmail.com</td>
                        <td>0913965654</td>
                        <td class="text-center">179</td>
                        <td class="text-sky-500 text-center">Edit</td>
                        <td class="text-red-500">Delete</td>
                    </tr>
                    <tr>
                        <td>Karl Doctolero</td>
                        <td>karl@gmail.com</td>
                        <td>09123646978</td>
                        <td class="text-center">180</td>
                        <td class="text-sky-500 text-center">Edit</td>
                        <td class="text-red-500">Delete</td>
                    </tr>
                    <tr>
                        <td>Kurt Nanalis</td>
                        <td>nanalis@gmail.com</td>
                        <td>09102059607</td>
                        <td class="text-center">178</td>
                        <td class="text-sky-500 text-center">Edit</td>
                        <td class="text-red-500">Delete</td>
                    </tr>
                    <tr>
                        <td>Andrei Casoco</td>
                        <td>casoco@gmail.com</td>
                        <td>09125628490</td>
                        <td class="text-center">188</td>
                        <td class="text-sky-500 text-center">Edit</td>
                        <td class="text-red-500">Delete</td>
                    </tr>
                    <tr>
                        <td>Emmanuel Mojares</td>
                        <td>Emman@gmail.com</td>
                        <td>09125628490</td>
                        <td class="text-center">188</td>
                        <td class="text-sky-500 text-center">Edit</td>
                        <td class="text-red-500">Delete</td>
                    </tr>
                </tbody>

            </table>

            </div>
            <!--/Card-->


        </div>
        <!--/container-->
        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
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