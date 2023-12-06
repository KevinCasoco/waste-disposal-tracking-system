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
        <li class="mb-1 group">
            <a href="{{ asset('user-residents')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                <i class="ri-user-fill mr-3 text-lg"></i>
                <span class="text-sm">Residents</span>
            </a>
        </li>
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
    </ul>
    </div>

    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- END SIDEBAR -->


    <main class="w-full md:w-[calc(100%-240px)] md:ml-60 bg-slate-200  min-h-screen transition-all main">

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

</main>
   <!-- END Main -->


@endif

</x-app-layout>
