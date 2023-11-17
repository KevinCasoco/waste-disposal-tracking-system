<x-app-layout>
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
        <a href="{{ asset('user-sched')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
            <i class="ri-calendar-2-fill mr-3 text-lg"></i>
            <span class="text-sm">Schedule</span>
        </a>
    </li>
    <li class="mb-1 group">
        <a href="{{ asset('augmented')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
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
                        <th data-priority="1">Email Address</th>
                        <th data-priority="2">Full Name</th>
                        {{-- <th data-priority="3">Contact Number</th> --}}
                        {{-- <th data-priority="3">Barangay</th> --}}
                        <th data-priority="3">Role</th>
                        <th data-priority="4">Edit</th>
                        <th data-priority="5">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role }}</td>
                        <td class="text-sky-500 text-center">
                            <button id="" class="modal-open hover:border-indigo-900 text-blue-500 hover:text-indigo-900 font-bold py-2 px-4 rounded-full">Edit</button>
                        </td>
                        {{-- <td class="text-red-500 text-center">Delete</td> --}}
                        <td>
                            <!-- Delete button -->
                            <form method="post" action="{{ route('user-residents.destroy_user_residents', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--/Card-->
    </div>
    <!--/container-->
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
