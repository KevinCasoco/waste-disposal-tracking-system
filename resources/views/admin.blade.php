<x-app-layout>
     @if (Auth::user()->role == 'admin')

     <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
	<!--Replace with your tailwind.css once created-->


	<!--Regular Datatables CSS-->
	<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

	<style>
		/*Overrides for Tailwind CSS */

		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			/*text-gray-700*/
			padding-left: 1rem;
			/*pl-4*/
			padding-right: 1rem;
			/*pl-4*/
			padding-top: .5rem;
			/*pl-2*/
			padding-bottom: .5rem;
			/*pl-2*/
			line-height: 1.25;
			/*leading-tight*/
			border-width: 2px;
			/*border-2*/
			border-radius: .25rem;
			border-color: #edf2f7;
			/*border-gray-200*/
			background-color: #edf2f7;
			/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
			/*bg-indigo-500*/
		}
	</style>


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
<div class="container w-full md:w-4/5 xl:w-3/5 mx-auto px-2 p-5 ">

    <!--Card-->
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Fullname</th>
                    <th data-priority="2">Email</th>
                    <th data-priority="3">Contact number</th>
                    <th data-priority="4">Role</th>
                    <th data-priority="5">Action</th>
                    <th data-priority="6">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jay-ar Grifaldea</td>
                    <td>grifaldea141@gmail.com</td>
                    <td>09122680523</td>
                    <td>Admin</td>
                    <td class="text-sky-500 text-center">Edit</td>
                    <td class="text-red-500">Delete</td>
                </tr>

                <tr>
                    <td>Carlo Delos Santos</td>
                    <td>carlo@gmail.com</td>
                    <td>0913965654</td>
                    <td>Admin</td>
                    <td class="text-sky-500 text-center">Edit</td>
                    <td class="text-red-500">Delete</td>
                </tr>
                <tr>
                    <td>Karl Doctolero</td>
                    <td>dockarl@gmail.com</td>
                    <td>09123646978</td>
                    <td>Admin</td>
                    <td class="text-sky-500 text-center">Edit</td>
                    <td class="text-red-500">Delete</td>
                </tr>
                <tr>
                    <td>Kurt Nanalis</td>
                    <td>nanaliskurt@gmail.com</td>
                    <td>09102059607</td>
                    <td>Admin</td>
                    <td class="text-sky-500 text-center">Edit</td>
                    <td class="text-red-500">Delete</td>
                </tr>
                <tr>
                    <td>Andrei Casoco</td>
                    <td>casocoandrei@gmail.com</td>
                    <td>09125628490</td>
                    <td>Admin</td>
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
