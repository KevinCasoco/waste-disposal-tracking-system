<x-app-layout>
    @if (Auth::user()->role == 'admin')
        <div class="relative min-h-screen md:flex">

            <!-- mobile menu bar -->
            <div class="bg-white text-black flex justify-end md:hidden">

                <!-- mobile menu button -->
                <button class="mobile-menu-button pr-3 pt-3 pb-3 focus:outline-none focus:bg-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- sidebar -->
            <div
                class="sidebar bg-white text-black w-64 space-y-6 py-1 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20">

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
                        <li class="mb-1 group">
                            <a href="{{ asset('collector') }}"
                                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                                <i class="ri-truck-line mr-3 text-lg"></i>
                                <span class="text-sm">Truck</span>
                            </a>
                        </li>
                        <li class="mb-1 group">
                            <a href="{{ asset('residents') }}"
                                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white transition duration-200">
                                <i class="ri-user-fill mr-3 text-lg"></i>
                                <span class="text-sm">Residents</span>
                            </a>
                        </li>
                        <li class="mb-1 group active">
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
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            logout?</h3>
                        <div class="flex justify-end items-end">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a :href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                    <i class="ri-logout-box-line mr-1 text-lg"></i>
                                    <span class="text-sm">Logout</span>
                                </a>
                            </form>
                            <div class="absolute mr-[110px] -mb-2">
                                <button onclick="document.getElementById('logoutModal').classList.add('hidden')"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-3 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="flex-grow text-gray-800">
                <main class="p-1 pb-3 space-y-6">
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><div class="container mt-4 hidden md:block">
                        {{-- For Search --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-2">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search Schedule">
                                    <div class="input-group-append">
                                        <button id="searchButton" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="btn-group mb-2" role="group" aria-label="Calendar Actions">
                                    <button id="exportButton" class="btn btn-success">Export Calendar</button>
                                </div>
                                <div class="btn-group mb-2 ml-1" role="group" aria-label="Calendar Actions">
                                    <a href="{{ asset('add') }}" class="btn btn-success px-3">Create New Schedule</a>
                                </div>
                            </div>

                            <div class="sm:flex md:flex mt-1">
                                {{-- email notification --}}
                                <form action="{{ route('schedule.admin_sendNotification') }}" method="POST" class="ml-3">
                                    @csrf
                                    <button class="py-2 px-2 mb-2 rounded bg-green-500 hover:bg-green-700 text-white" type="submit">
                                        <i class="ri-mail-send-line mr-1"></i>Notify Users(Email)
                                    </button>
                                </form>
                                {{-- sms notification --}}
                                <form action="{{ route('schedule.sms') }}" method="POST" class="ml-3">
                                    @csrf
                                    <button class="py-2 px-2 mb-3 rounded bg-red-500 hover:bg-green-700 text-white" type="submit">
                                        <i class="ri-mail-send-line mr-1"></i>Notify Users(SMS)
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="container mt-4 md:hidden">
                        {{-- For Search --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-2">
                                    <input type="text" id="searchInput" class="form-control" placeholder="Search Schedule">
                                    <div class="input-group-append">
                                        <button id="searchButton" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <div class="" role="group" aria-label="Calendar Actions">
                                            <button id="exportButton" class="py-2 px-2 rounded bg-green-500 hover:bg-green-700 text-white w-100 btn-success">Export Calendar</button>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="" role="group" aria-label="Calendar Actions">
                                            <a href="{{ asset('add') }}" ><button id="exportButton" class="py-2 px-2 rounded bg-green-500 hover:bg-green-700 text-white w-100 btn-success">Add New Sched</button></a>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <form action="{{ route('schedule.admin_sendNotification') }}" method="POST" class="ml-0 ml-md-3">
                                            @csrf
                                            <button class="py-2 px-2 rounded bg-green-500 hover:bg-green-700 text-white w-100" type="submit">
                                                <i class="ri-mail-send-line mr-1"></i>Notify(Email)
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <form action="{{ route('schedule.sms') }}" method="POST" class="ml-0 ml-md-3">
                                            @csrf
                                            <button class="py-2 px-2 rounded bg-red-500 hover:bg-green-700 text-white w-100" type="submit">
                                                <i class="ri-mail-send-line mr-1"></i>Notify(SMS)
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div id="calendar" class="w-full h-screen overflow-x-auto"></div>
                            </div>
                        </div>
                    </div>


                    <style>
                        /* Regular font size for desktop */
                        .fc-header-toolbar {
                            font-size: 16px;
                            /* Adjust the font size as needed */
                        }

                        /* Media query for mobile devices */
                        @media (max-width: 768px) {
                            .fc-header-toolbar {
                                font-size: 8px;
                                /* Adjust the font size for mobile devices */
                            }
                        }
                    </style>

                    <!-- Delete Event Modal -->
                    <div class="modal fade" id="deleteEventModal" tabindex="-1" role="dialog" aria-labelledby="deleteEventModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteEventModalLabel">Delete Event</h5>
                                    <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                                        {{-- <span aria-hidden="true">&times;</span> --}}
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this event?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" id="cancelDeleteEvent">Cancel</button>
                                    <button type="button" id="confirmDeleteEvent" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>


                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
                        rel="stylesheet">
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

                            // Deleting The Event
                            eventContent: function(info) {
                                var address = info.event.extendedProps
                                    .location; // Assuming the address is stored within the location property
                                var secondPart = address.split(',')[1].trim();
                                console.log(secondPart);

                                var eventTitle =
                                    secondPart; // You can use this part of the address as the event title, if needed
                                var eventElement = document.createElement('div');
                                // eventElement.classList.add('flex', 'items-center', 'h-[100px]' ); // Adjust the height as needed, e.g., h-12
                                // eventElement.innerHTML = '<span style="cursor: pointer; overflow-wrap: break-word;" >❌</span> ' + eventTitle;

                                // Assuming eventTitle is "Congressional Road"
                                var maxLength = 10; // Adjust this value according to your needs

                                // Check if the eventTitle length exceeds the maximum length
                                if (eventTitle.length > maxLength) {
                                    // Split the eventTitle into words
                                    var words = eventTitle.split(' ');
                                    // Concatenate the first word with a line break after it, and join the rest of the words
                                    var truncatedTitle = words[0] + ' <br>' + words.slice(1).join(' ');
                                    // Assign the truncated title with Tailwind CSS classes to ensure line break
                                    var truncatedTitleWithBreak =
                                        '<span class="whitespace-normal break-words" style="cursor: pointer;">❌</span> ' +
                                        truncatedTitle;
                                    // Assign the truncated title with line breaks to the innerHTML of the span element
                                    eventElement.innerHTML = truncatedTitleWithBreak;
                                } else {
                                    // If the length is within the limit, simply assign the eventTitle to the innerHTML
                                    eventElement.innerHTML =
                                        '<span class="whitespace-normal break-words" style="cursor: pointer;">❌</span> ' +
                                        eventTitle;
                                }

                                // JavaScript code to handle modal functionality
                                eventElement.querySelector('span').addEventListener('click', function() {
                                    // Set the event ID associated with the modal
                                    $('#deleteEventModal').data('eventId', info.event.id);
                                    // Trigger Bootstrap modal for confirmation
                                    $('#deleteEventModal').modal('show');
                                });

                                // Handle deletion when confirmed
                                $('#confirmDeleteEvent').on('click', function() {
                                    // Get the event ID from the modal data
                                    var eventId = $('#deleteEventModal').data('eventId');
                                    $.ajax({
                                        method: 'DELETE',
                                        url: '/schedule/' + eventId,
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        success: function(response) {
                                            console.log('Event deleted successfully.');
                                            calendar.refetchEvents(); // Refresh events after deletion
                                            $('#deleteEventModal').modal('hide'); // Hide modal after deletion
                                        },
                                        error: function(error) {
                                            console.error('Error deleting event:', error);
                                            $('#deleteEventModal').modal('hide'); // Hide modal if deletion fails
                                        }
                                    });
                                });

                                // Handle canceling deletion
                                $('#cancelDeleteEvent').on('click', function() {
                                    $('#deleteEventModal').modal('hide');
                                });

                                // Handle modal close event
                                $('#deleteEventModal').on('hidden.bs.modal', function () {
                                    // Clear any data or reset modal state if needed
                                    $(this).removeData('eventId'); // Remove the eventId data when the modal is closed
                                });

                                return {
                                    domNodes: [eventElement]
                                };
                            },

                            // Drag And Drop

                            eventDrop: function(info) {
                                var eventId = info.event.id;
                                var newStartDate = info.event.start;
                                var newEndDate = info.event.end || newStartDate;
                                var newStartDateUTC = newStartDate.toISOString().slice(0, 10);
                                var newEndDateUTC = newEndDate.toISOString().slice(0, 10);

                                $.ajax({
                                    method: 'PUT',
                                    url: `/schedule/${eventId}`,
                                    data: {
                                        start_date: newStartDateUTC,
                                        end_date: newEndDateUTC,
                                    },
                                    success: function() {
                                        console.log('Event moved successfully.');
                                    },
                                    error: function(error) {
                                        console.error('Error moving event:', error);
                                    }
                                });
                            },

                            // Event Resizing
                            eventResize: function(info) {
                                var eventId = info.event.id;
                                var newEndDate = info.event.end;
                                var newEndDateUTC = newEndDate.toISOString().slice(0, 10);

                                $.ajax({
                                    method: 'PUT',
                                    url: `/schedule/${eventId}/resize`,
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        end_date: newEndDateUTC
                                    },
                                    success: function() {
                                        console.log('Event resized successfully.');
                                    },
                                    error: function(error) {
                                        console.error('Error resizing event:', error);
                                    }
                                });
                            },
                        });

                        calendar.render();

                        document.getElementById('searchButton').addEventListener('click', function() {
                            var searchKeywords = document.getElementById('searchInput').value.toLowerCase();
                            filterAndDisplayEvents(searchKeywords);
                        });


                        function filterAndDisplayEvents(searchKeywords) {
                            $.ajax({
                                method: 'GET',
                                url: `/events/search?location=${searchKeywords}`,
                                success: function(response) {
                                    calendar.removeAllEvents();
                                    calendar.addEventSource(response);
                                },
                                error: function(error) {
                                    console.error('Error searching events:', error);
                                }
                            });
                        }


                        // export excel file
                        document.getElementById('exportButton').addEventListener('click', function() {
                            var events = calendar.getEvents().map(function(event) {
                                return {
                                    id: event.id,
                                    location: event.extendedProps.location,
                                    start: event.start ? formatDate(event.start) : null,
                                    time: event.extendedProps.time,
                                };
                            });

                            var wb = XLSX.utils.book_new();

                            var ws = XLSX.utils.json_to_sheet(events, {
                                origin: 'A2'
                            });

                            // Add a title header at the top with styling
                            var titleHeader = [
                                ['Waste Collection Schedule']
                            ];
                            XLSX.utils.sheet_add_aoa(ws, titleHeader, {
                                origin: {
                                    r: 0,
                                    c: 0
                                },
                                style: {
                                    font: {
                                        bold: true,
                                        size: 16
                                    }
                                } // Example styling - adjust as needed
                            });

                            XLSX.utils.book_append_sheet(wb, ws, 'Waste Collection Schedule');

                            var arrayBuffer = XLSX.write(wb, {
                                bookType: 'xlsx',
                                type: 'array'
                            });

                            var blob = new Blob([arrayBuffer], {
                                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                            });

                            var downloadLink = document.createElement('a');
                            downloadLink.href = URL.createObjectURL(blob);
                            downloadLink.download = 'waste-collection-schedule.xlsx';
                            downloadLink.click();
                        });

                        function formatDate(date) {
                            // Extract only the date part from the ISO string
                            return date ? date.toISOString().split('T')[0] : null;
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
            </div>
    @endif

</x-app-layout>
