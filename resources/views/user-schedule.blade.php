<x-app-layout>
@if (Auth::user()->role == 'residents')

<div class="relative min-h-screen md:flex">

    <!-- mobile menu bar -->
    <div class="bg-white text-black flex justify-end md:hidden">
      <!-- logo -->
      {{-- <a href="#" class="block p-4 text-black font-bold">WDT System</a> --}}

      <!-- mobile menu button -->
      <button class="mobile-menu-button p-4 focus:outline-none focus:bg-white">
        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- sidebar -->
    <div class="sidebar bg-white text-black w-64 space-y-6 py-1 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20">

      <!-- logo -->
      {{-- <div class="ml-2 flex items-center rounded-md ">
        <a class="flex item-center ">
            <img src="{{ asset('/images/Waste-Logo.png') }}" alt="" class="w-14 h-14 rounded object-cover">
            <span class="text-lg font-extrabold text-black ml-2">Waste Disposal Tracking System</span>
        </a>
      </div>
      <hr class="my-2 text-gray-600"> --}}

      <!-- nav -->
      <nav>
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
        {{-- <li class="mb-1 group">
            <a href="{{ asset('user-residents')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-user-fill mr-3 text-lg"></i>
                <span class="text-sm">Residents</span>
            </a>
        </li> --}}
        <li class="mb-1 group active">
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
        <li class="mb-1 group">
            <a href="{{ asset('profile') }}"
                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                <i class="ri-user-settings-line mr-3 text-lg"></i>
                <span class="text-sm">Profile</span>
            </a>
        </li>
        <li class="mb-1 group">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <a :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();"
                class="flex items-center py-2 px-4 text-black hover:bg-red-500 hover:text-gray-100 rounded-md group-[.active]:bg-red-500 group-[.active]:text-white group-[.selected]:bg-red500 group-[.selected]:text-white transition duration-200">
                <i class="ri-logout-box-line mr-3 text-lg"></i>
                <span class="text-sm">Logout</span>
            </a>
        </form>
        </li>
    </ul>
    </nav>
    </div>


    <!-- content -->
    <div class="flex-grow text-gray-800">
        <main class="p-6 sm:p-1 space-y-6">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- START CALENDAR -->
        <div class="card">
            <div class="card-body">
                <div id="calendar" style="width: 100%;height:100vh"></div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendarEl = document.getElementById('calendar');
        var events = [];
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            initialView: 'dayGridMonth',
            timeZone: 'UTC',
            events: '/events',
            editable: true,
        });

        calendar.render();

        document.getElementById('searchButton').addEventListener('click', function() {
            var searchKeywords = document.getElementById('searchInput').value.toLowerCase();
            filterAndDisplayEvents(searchKeywords);
        });


        function filterAndDisplayEvents(searchKeywords) {
            $.ajax({
                method: 'GET',
                url: `/events/search?title=${searchKeywords}`,
                success: function(response) {
                    calendar.removeAllEvents();
                    calendar.addEventSource(response);
                },
                error: function(error) {
                    console.error('Error searching events:', error);
                }
            });
        }
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

</main>
   <!-- END Main -->


@endif

</x-app-layout>
