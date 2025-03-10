<x-app-layout>
    @if (Auth::user()->role == 'admin')
        <div class="relative min-h-screen md:flex">

            <!-- mobile menu bar -->
            <div class="bg-white text-black flex justify-end md:hidden">

                <!-- mobile menu button -->
                <button class="mobile-menu-button p-4 focus:outline-none focus:bg-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- sidebar -->
            <div
                class="sidebar bg-white text-black w-64 space-y-6 py-1 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20 shadow">

                <!-- nav -->
                <nav>
                    <ul class="mt-2">
                        <li class="mb-1 group active">
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
                        <li class="mb-1 group">
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
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-3 text-center">
                                    <i class="ri-logout-box-line mr-1 text-lg"></i>
                                    <span class="text-sm">Logout</span>
                                </a>
                            </form>
                            <div class="absolute mr-[100px] -mb-2.5">
                                <button onclick="document.getElementById('logoutModal').classList.add('hidden')"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-3 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="flex-grow text-gray-800">
                <main class="p-6 sm:p-10 space-y-6">

                    <section class="grid md:grid-cols-6 xl:grid-cols-6 gap-6">
                        <a href="{{ route('admin') }}">
                            <div
                                class="p-2 bg-blue-500 rounded-lg flex items-center h-32 shadow-lg hover:bg-blue-600 hover:shadow-xl">

                                <div class="w-3/5 flex justify-start">
                                    <ul>
                                        <li class="font-extrabold text-white">
                                            Admin</li>
                                        <li class="font-extrabold text-white text-xl">{{ $countAdmins }}</li>
                                    </ul>
                                </div>

                                <div class="w-3/5 flex justify-end ">
                                    <ul>
                                        <li class="">
                                            <i class="ri-admin-fill mr-3 text-lg text-white"
                                                style="font-size: 22px;"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                        <a href="{{ asset('collector') }}">
                            <div
                                class="p-2 bg-[#FF4069] rounded-lg flex items-center h-32 shadow-lg hover:bg-[#e5395e] hover:shadow-xl">
                                <div class="w-3/5 flex justify-between">
                                    <ul>
                                        <li class="font-extrabold text-white">
                                            Collector
                                        </li>
                                        <li class="font-extrabold text-white text-xl">
                                            {{ $countCollector }}
                                        </li>
                                    </ul>
                                </div>

                                <div class="w-3/5 flex justify-end ">
                                    <ul>
                                        <li class="">
                                            <i class="ri-map-pin-user-fill mr-3 text-lg text-white"
                                                style="font-size: 22px;"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <a href="{{ asset('residents') }}">
                                <div
                                    class="p-2 bg-orange-400 rounded-lg flex items-center h-32 shadow-lg hover:bg-orange-500 hover:shadow-xl">

                                    <div class="w-3/5 flex justify-start">
                                        <ul>
                                            <li class="font-bold text-white">Residents</li>
                                            <li class="font-extrabold text-white text-xl">{{ $countResidents }}</li>
                                        </ul>
                                    </div>

                                    <div class="w-3/5 flex justify-end ">
                                        <ul>
                                            <li class="">
                                                <i class="ri-user-fill mr-3 text-lg text-white"
                                                    style="font-size: 22px;"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ asset('schedule-list') }}">

                                <div
                                    class="p-2 bg-[#4ECE5D] rounded-lg flex items-center h-32 shadow-lg hover:bg-[#46b953] hover:shadow-xl">

                                    <div class="w-3/5 flex justify-start">
                                        <ul>
                                            <li class="font-bold text-white">Schedules</li>
                                            <li class="font-extrabold text-white text-xl">{{ $countSchedules }}</li>
                                        </ul>
                                    </div>

                                    <div class="w-3/5 flex justify-end ">
                                        <ul>
                                            <li class="">
                                                <i class="ri-calendar-fill mr-3 text-lg text-white"
                                                    style="font-size: 22px;"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ url('check-weight') }}">

                                <div
                                    class="p-2 bg-purple-400 rounded-lg flex items-center h-32 shadow-lg hover:bg-purple-500 hover:shadow-xl">

                                    <div class="w-3/5 flex justify-start">
                                        <ul>
                                            <li class="font-bold text-white">Truck Weight</li>
                                            <div class="flex">
                                                <li class="font-extrabold text-white text-xl" id="truck-weight">
                                                    {{ $truck_weight }}</li>
                                                <span class="font-extrabold text-white text-xl ml-1">Kg</span>
                                            </div>

                                        </ul>
                                    </div>

                                    <script>
                                        // Function to fetch updated truck weight
                                        function fetchTruckWeight() {
                                            fetch('/get-truck-weight')
                                                .then(response => response.json())
                                                .then(data => {
                                                    // Update the truck weight in the HTML element
                                                    document.getElementById('truck-weight').textContent = data.truck_weight;
                                                })
                                                .catch(error => {
                                                    console.error('Error fetching truck weight:', error);
                                                });
                                        }

                                        // Function to refresh truck weight every 5 seconds
                                        function autoRefresh() {
                                            setInterval(fetchTruckWeight, 5000); // Refresh every 5 seconds
                                        }

                                        // Initial call to start auto-refresh
                                        autoRefresh();
                                    </script>

                                    <div class="w-3/5 flex justify-end ">
                                        <ul>
                                            <li class="">
                                                <i class="ri-truck-line mr-3 text-lg text-white"
                                                    style="font-size: 22px;"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ url('check-weight-trash') }}">

                                <div
                                    class="p-2 bg-orange-300 rounded-lg flex items-center h-32 shadow-lg hover:bg-orange-400 hover:shadow-xl">

                                    <div class="w-3/5 flex justify-start">
                                        <ul>
                                            <li class="font-bold text-white">Trash Bin Weight</li>
                                            <div class="flex">
                                                <li class="font-extrabold text-white text-xl" id="trash-weight">
                                                    {{ $trash_weight }} </li>
                                                <span class="font-extrabold text-white text-xl ml-1">Kg</span>
                                            </div>
                                        </ul>
                                    </div>

                                    <script>
                                        // Function to fetch updated truck weight
                                        function fetchTrashWeight() {
                                            fetch('/get-trash-weight')
                                                .then(response => response.json())
                                                .then(data => {
                                                    // Update the truck weight in the HTML element
                                                    document.getElementById('trash-weight').textContent = data.trash_weight;
                                                })
                                                .catch(error => {
                                                    console.error('Error fetching truck weight:', error);
                                                });
                                        }

                                        // Function to refresh truck weight every 5 seconds
                                        function autoRefresh1() {
                                            setInterval(fetchTrashWeight, 5000); // Refresh every 5 seconds
                                        }

                                        // Initial call to start auto-refresh
                                        autoRefresh1();
                                    </script>

                                    <div class="w-3/5 flex justify-end ">
                                        <ul>
                                            <li class="">
                                                <i class="ri-delete-bin-4-fill mr-3 text-lg text-white"
                                                    style="font-size: 22px;"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>


                    </section>

                    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="p-2 flex-grow">
                                <h2 class="text-xl font-semibold text-center">Active and Inactive Users</h2>
                                <div class="w-full h-[300px] flex justify-center items-center">
                                    <canvas id="myBarChart" width="400" height="240"></canvas>
                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    const barchart = document.getElementById('myBarChart');
                                    const chartData = @json($chartData); // Convert PHP array to JSON

                                    new Chart(barchart, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Admin', 'Collector', 'Residents'],
                                            datasets: [{
                                                    label: 'Active Users',
                                                    data: [
                                                        chartData.admin.active,
                                                        chartData.collector.active,
                                                        chartData.residents.active
                                                    ],
                                                    backgroundColor: [
                                                        '#46b953',
                                                        '#46b953',
                                                        '#46b953'
                                                    ],
                                                    borderColor: [
                                                        'rgb(255, 99, 132)',
                                                        'rgb(173, 216, 230)',
                                                        'rgb(255, 159, 64)',
                                                        'rgb(255, 182, 193)',
                                                        'rgb(255, 205, 86)',
                                                        'rgb(255, 222, 173)'
                                                    ],
                                                    borderWidth: 1
                                                },
                                                {
                                                    label: 'Inactive Users',
                                                    data: [
                                                        chartData.admin.inactive,
                                                        chartData.collector.inactive,
                                                        chartData.residents.inactive
                                                    ],
                                                    backgroundColor: [
                                                        '#FF4069',
                                                        '#FF4069',
                                                        '#FF4069'
                                                    ],
                                                    borderColor: [
                                                        'rgb(255, 99, 132)',
                                                        'rgb(173, 216, 230)',
                                                        'rgb(255, 159, 64)',
                                                        'rgb(255, 182, 193)',
                                                        'rgb(255, 205, 86)',
                                                        'rgb(255, 222, 173)'
                                                    ],
                                                    borderWidth: 1
                                                }
                                            ]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true,
                                                    position: 'top',
                                                    labels: {
                                                        boxWidth: 20,
                                                        usePointStyle: true
                                                    }
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>

                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <h2 class="text-xl font-semibold mt-4 text-center mb-8">Status</h2>
                            <div class="p-4 flex-grow">
                                <div class="w-full h-[300px] sm:h-[240px] flex justify-center items-center gap-16">
                                    {{-- <canvas class="flex justify-center items-center" id="myChart"  width="400" height="240"></canvas> --}}

                                    <div class="w-5/5 text-center">
                                        <i class="ri-delete-bin-4-fill mr-3 text-lg text-green-400" style="font-size: 140px;"></i>
                                        <ul>
                                            <li class="font-bold text-black text-xl mt-3">
                                                Trash Weight Status
                                            </li>
                                            <li class="font-extrabold text-xl" id="trash-weight-status">
                                                {{ $status_trash_bin }}
                                            </li>
                                        </ul>

                                        <script>
                                            function getStatusColor(status) {
                                                // Extract the percentage from the status
                                                var percentage = parseInt(status.replace('%', ''));

                                                // Dynamically determine the color based on the percentage
                                                if (percentage == 0) {
                                                    return 'green'; // Green color for 0%
                                                } else if (percentage >= 90) {
                                                    return 'red'; // Red color for 90% and above
                                                } else if (percentage >= 80) {
                                                    return 'orange'; // Orange color for 80-89%
                                                } else if (percentage >= 60) {
                                                    return 'yellow'; // Yellow color for 60-79%
                                                } else if (percentage >= 40) {
                                                    return '#FFD700'; // Gold color for 40-59%
                                                } else {
                                                    return '#32CD32'; // LimeGreen color for less than 40%
                                                }
                                            }

                                            // Function to fetch updated truck weight
                                            function fetchTrashWeightStatus() {
                                                fetch('/get-trash-weight-status')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        // Update the truck weight in the HTML element
                                                        var trashWeightStatusElement = document.getElementById('trash-weight-status');
                                                        trashWeightStatusElement.textContent = data.status;
                                                        trashWeightStatusElement.style.color = getStatusColor(data.status);
                                                    })
                                                    .catch(error => {
                                                        console.error('Error fetching truck weight:', error);
                                                    });
                                            }

                                            // Function to refresh truck weight every 5 seconds
                                            function autoRefresh2() {
                                                setInterval(fetchTrashWeightStatus, 5000); // Refresh every 5 seconds
                                            }

                                            // Initial call to start auto-refresh
                                            autoRefresh2();
                                        </script>
                                    </div>

                                    <div class="w-5/5 text-center ">
                                        <i class="ri-truck-line text-lg text-green-400" style="font-size: 150px;"></i>
                                        <ul>
                                            <li class="font-bold text-black mt-2 text-xl">
                                                Truck Weight Status
                                            </li>
                                            <li class="font-extrabold text-black text-xl" id="truck-weight-status">
                                                {{ $status_truck }}
                                            </li>
                                        </ul>

                                        <script>
                                            function getStatusColorTruck(status_truck) {
                                                // Extract the percentage from the status
                                                var percentage = parseInt(status_truck.replace('%', ''));

                                                // Dynamically determine the color based on the percentage
                                                if (percentage == 0) {
                                                    return 'green'; // Green color for 0%
                                                } else if (percentage >= 90) {
                                                    return 'red'; // Red color for 90% and above
                                                } else if (percentage >= 80) {
                                                    return 'orange'; // Orange color for 80-89%
                                                } else if (percentage >= 60) {
                                                    return 'yellow'; // Yellow color for 60-79%
                                                } else if (percentage >= 40) {
                                                    return '#FFD700'; // Gold color for 40-59%
                                                } else {
                                                    return '#32CD32'; // LimeGreen color for less than 40%
                                                }
                                            }

                                            // Function to fetch updated truck weight
                                            function fetchTruckWeightStatus() {
                                                fetch('/get-truck-weight-status')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        // Update the truck weight in the HTML element
                                                        var trashWeightStatusElement = document.getElementById('truck-weight-status');
                                                        trashWeightStatusElement.textContent = data.status_truck;
                                                        trashWeightStatusElement.style.color = getStatusColorTruck(data.status_truck);
                                                    })
                                                    .catch(error => {
                                                        console.error('Error fetching truck weight:', error);
                                                    });
                                            }

                                            // Function to refresh truck weight every 5 seconds
                                            function autoRefresh3() {
                                                setInterval(fetchTruckWeightStatus, 5000); // Refresh every 5 seconds
                                            }

                                            // Initial call to start auto-refresh
                                            autoRefresh3();
                                        </script>
                                    </div>

                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            </div>
                        </div>

                    </section>

                    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="p-4 flex-grow">
                                <h2 class="text-xl font-semibold text-center">Collection of Truck Summary</h2>
                                <div class="w-full h-[300px] flex justify-center items-center">
                                    <canvas id="myTruckBarChart" width="400" height="240"></canvas>
                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    const barcharttruck = document.getElementById('myTruckBarChart');
                                    const chartWeightData = @json($chartWeightData); // Convert PHP array to JSON

                                    new Chart(barcharttruck, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Monthly', 'Weekly', 'Daily'],
                                            datasets: [{
                                                label: 'Truck Collection',
                                                data: [
                                                    chartWeightData.monthly.monthlyData,
                                                    chartWeightData.weekly.weeklyData,
                                                    chartWeightData.daily.dailyData
                                                ],
                                                backgroundColor: [
                                                    'rgb(192 132 252',
                                                    'rgb(192 132 252',
                                                    'rgb(192 132 252',
                                                ],
                                                borderColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 99, 132)',
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true,
                                                    position: 'top',
                                                    labels: {
                                                        boxWidth: 20,
                                                        usePointStyle: true
                                                    }
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>

                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="p-4 flex-grow">
                                <h2 class="text-xl font-semibold text-center">Collection of Trash Bin Summary</h2>
                                <div class="w-full h-[300px] flex justify-center items-center">
                                    <canvas id="myTrashBarChart" width="400" height="240"></canvas>
                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    const barcharttrash = document.getElementById('myTrashBarChart');
                                    const chartWeightTrashData = @json($chartWeightTrashData); // Convert PHP array to JSON

                                    new Chart(barcharttrash, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Monthly', 'Weekly', 'Daily'],
                                            datasets: [{
                                                label: 'Trash Collection',
                                                data: [
                                                    chartWeightTrashData.monthly.monthlyData,
                                                    chartWeightTrashData.weekly.weeklyData,
                                                    chartWeightTrashData.daily.dailyData
                                                ],
                                                backgroundColor: [
                                                    'rgb(253 186 116',
                                                    'rgb(253 186 116',
                                                    'rgb(253 186 116',
                                                ],
                                                borderColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 99, 132)',
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true,
                                                    position: 'top',
                                                    labels: {
                                                        boxWidth: 20,
                                                        usePointStyle: true
                                                    }
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>
                    </section>

                    <section class="grid grid-cols-1 md:grid-cols-1 gap-6">
                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="p-4 flex-grow">
                                <h2 class="text-xl font-semibold text-center">Trash Bin Summary</h2>
                                <div class="w-full h-[300px] flex justify-center items-center">
                                    <canvas id="myTrashBinChart" width="1000" height="240"></canvas>
                                </div>

                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    const barChartTrash = document.getElementById('myTrashBinChart');
                                    const chartWeightTrashBinData = @json($chartWeightTrashBinData); // Convert PHP array to JSON

                                    new Chart(barChartTrash, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Barangay 176', 'Barangay 177', 'Barangay 178', 'Barangay 179', 'Barangay 180',
                                                'Barangay 181', 'Barangay 182', 'Barangay 183', 'Barangay 184', 'Barangay 185'
                                            ],
                                            datasets: [{
                                                label: 'List of Barangays',
                                                data: [
                                                    chartWeightTrashBinData.barangay.barangay_176,
                                                    chartWeightTrashBinData.barangay.barangay_177,
                                                    chartWeightTrashBinData.barangay.barangay_178,
                                                    chartWeightTrashBinData.barangay.barangay_179,
                                                    chartWeightTrashBinData.barangay.barangay_180,
                                                    chartWeightTrashBinData.barangay.barangay_181,
                                                    chartWeightTrashBinData.barangay.barangay_182,
                                                    chartWeightTrashBinData.barangay.barangay_183,
                                                    chartWeightTrashBinData.barangay.barangay_184,
                                                    chartWeightTrashBinData.barangay.barangay_185,
                                                ],
                                                backgroundColor: [
                                                    'rgb(253, 186, 116)',
                                                    'rgb(253, 206, 116)',
                                                    'rgb(253, 226, 116)',
                                                    'rgb(253, 246, 116)',
                                                    'rgb(233, 253, 116)',
                                                    'rgb(213, 253, 116)',
                                                    'rgb(193, 253, 116)',
                                                    'rgb(173, 253, 116)',
                                                    'rgb(153, 253, 116)',
                                                    'rgb(133, 253, 116)',
                                                ],
                                                borderColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(255, 206, 86)',
                                                    'rgb(75, 192, 192)',
                                                    'rgb(153, 102, 255)',
                                                    'rgb(255, 159, 64)',
                                                    'rgb(75, 192, 192)',
                                                    'rgb(255, 99, 132)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(255, 206, 86)',
                                                ],

                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true,
                                                    position: 'top',
                                                    labels: {
                                                        boxWidth: 20,
                                                        usePointStyle: true
                                                    }
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>

                    </section>
                </main>
            </div>

        </div>
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
    @endif

    @if (Auth::user()->role == 'collector')
        <div class="relative min-h-screen md:flex">

            <!-- mobile menu bar -->
            <div class="bg-white text-black flex justify-end md:hidden">
                <!-- logo -->
                {{-- <a href="#" class="block p-4 text-black font-bold">WDT System</a> --}}

                <!-- mobile menu button -->
                <button class="mobile-menu-button p-4 focus:outline-none focus:bg-white">
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
                        <li class="mb-1 group active">
                            <a href="{{ asset('dashboard') }}"
                                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                                <i class="ri-dashboard-fill mr-3 text-lg"></i>
                                <span class="text-sm">Dashboard</span>
                            </a>
                        </li>
                        {{-- <li class="mb-1 group">
                            <a href="{{ asset('collector-residents') }}"
                                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                                <i class="ri-user-fill mr-3 text-lg"></i>
                                <span class="text-sm">Collector</span>
                            </a>
                        </li> --}}
                        <li class="mb-1 group">
                            <a href="{{ asset('collector-schedule') }}"
                                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                                <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                                <span class="text-sm">Calendar Schedule</span>
                            </a>
                        </li>
                        <li class="mb-1 group">
                            <a href="{{ asset('collector-schedule-list') }}"
                                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                                <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                                <span class="text-sm">Schedule List</span>
                            </a>
                        </li>
                        <li class="mb-1 group">
                            <a href="{{ asset('location') }}"
                                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                                <i class="ri-map-fill mr-3 text-lg"></i>
                                <span class="text-sm">Location</span>
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            logout?</h3>
                        <div class="flex justify-end items-end">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-3 text-center">
                                    <i class="ri-logout-box-line mr-1 text-lg"></i>
                                    <span class="text-sm">Logout</span>
                                </a>
                            </form>
                            <div class="absolute mr-[100px] -mb-2.5">
                                <button onclick="document.getElementById('logoutModal').classList.add('hidden')"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-3 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="flex-grow text-gray-800">
                <main class="p-6 sm:p-10 space-y-6">

                    <section class="grid md:grid-cols-6 xl:grid-cols-6 gap-6">
                        <div
                            class="p-2 bg-blue-500 rounded-lg flex items-center h-32 shadow-lg hover:bg-blue-600 hover:shadow-xl">
                            <div class="w-3/5 flex justify-start">
                                <ul>
                                    <li class="font-extrabold text-white">
                                        Admin</li>
                                    <li class="font-extrabold text-white text-xl">{{ $countAdmins }}</li>
                                </ul>
                            </div>

                            <div class="w-3/5 flex justify-end ">
                                <ul>
                                    <li class="">
                                        <i class="ri-admin-fill mr-3 text-lg text-white" style="font-size: 22px;"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <a href="{{ asset('collector-residents') }}">
                            <div
                                class="p-2 bg-[#FF4069] rounded-lg flex items-center h-32 shadow-lg hover:bg-[#e5395e] hover:shadow-xl">
                                <div class="w-3/5 flex justify-start">
                                    <ul>
                                        <li class="font-bold text-white">Collector</li>
                                        <li class="font-extrabold text-white text-xl">{{ $countCollector }}</li>
                                    </ul>
                                </div>
                                <div class="w-3/5 flex justify-end ">
                                    <ul>
                                        <li class="">
                                            <i class="ri-map-pin-user-fill mr-3 text-lg text-white"
                                                style="font-size: 22px;"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                        <div
                            class="p-2 bg-orange-400 rounded-lg flex items-center h-32 shadow-lg hover:bg-orange-500 hover:shadow-xl">
                            <div class="w-3/5 flex justify-start">
                                <ul>
                                    <li class="font-bold text-white">Residents</li>
                                    <li class="font-extrabold text-white text-xl">{{ $countResidents }}</li>
                                </ul>
                            </div>
                            <div class="w-3/5 flex justify-end ">
                                <ul>
                                    <li class="">
                                        <i class="ri-user-fill mr-3 text-lg text-white" style="font-size: 22px;"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <a href="{{ asset('collector-schedule-list') }}">
                            <div
                                class="p-2 bg-[#4ECE5D] rounded-lg flex items-center h-32 shadow-lg hover:bg-[#46b953] hover:shadow-xl">
                                <div class="w-3/5 flex justify-start">
                                    <ul>
                                        <li class="font-bold text-white">Schedules</li>
                                        <li class="font-extrabold text-white text-xl">{{ $countSchedules }}</li>
                                    </ul>
                                </div>
                                <div class="w-3/5 flex justify-end ">
                                    <ul>
                                        <li class="">
                                            <i class="ri-calendar-fill mr-3 text-lg text-white"
                                                style="font-size: 22px;"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                        <a href="{{ url('check-weight') }}">

                            <div
                                class="p-2 bg-purple-400 rounded-lg flex items-center h-32 shadow-lg hover:bg-purple-500 hover:shadow-xl">

                                <div class="w-3/5 flex justify-start">
                                    <ul>
                                        <li class="font-bold text-white">Truck Weight</li>
                                        <div class="flex">
                                            <li class="font-extrabold text-white text-xl" id="truck-weight">
                                                {{ $truck_weight }}</li>
                                            <span class="font-extrabold text-white text-xl ml-1">Kg</span>
                                        </div>
                                    </ul>
                                </div>

                                <script>
                                    // Function to fetch updated truck weight
                                    function fetchTruckWeight() {
                                        fetch('/get-truck-weight')
                                            .then(response => response.json())
                                            .then(data => {
                                                // Update the truck weight in the HTML element
                                                document.getElementById('truck-weight').textContent = data.truck_weight;
                                            })
                                            .catch(error => {
                                                console.error('Error fetching truck weight:', error);
                                            });
                                    }
                                    // Function to refresh truck weight every 5 seconds
                                    function autoRefresh() {
                                        setInterval(fetchTruckWeight, 5000); // Refresh every 5 seconds
                                    }
                                    // Initial call to start auto-refresh
                                    autoRefresh();
                                </script>

                                <div class="w-3/5 flex justify-end ">
                                    <ul>
                                        <li class="">
                                            <i class="ri-truck-line mr-3 text-lg text-white"
                                                style="font-size: 22px;"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                        <a href="{{ url('check-weight-trash') }}">

                            <div
                                class="p-2 bg-orange-300 rounded-lg flex items-center h-32 shadow-lg hover:bg-orange-400 hover:shadow-xl">

                                <div class="w-3/5 flex justify-start">
                                    <ul>
                                        <li class="font-bold text-white">Trash Bin Weight</li>
                                        <div class="flex">
                                            <li class="font-extrabold text-white text-xl" id="trash-weight">
                                                {{ $trash_weight }}</li>
                                            <span class="font-extrabold text-white text-xl ml-1">Kg</span>
                                        </div>
                                    </ul>
                                </div>

                                <script>
                                    // Function to fetch updated truck weight
                                    function fetchTrashWeight() {
                                        fetch('/get-trash-weight')
                                            .then(response => response.json())
                                            .then(data => {
                                                // Update the truck weight in the HTML element
                                                document.getElementById('trash-weight').textContent = data.trash_weight;
                                            })
                                            .catch(error => {
                                                console.error('Error fetching truck weight:', error);
                                            });
                                    }
                                    // Function to refresh truck weight every 5 seconds
                                    function autoRefresh1() {
                                        setInterval(fetchTrashWeight, 5000); // Refresh every 5 seconds
                                    }
                                    // Initial call to start auto-refresh
                                    autoRefresh1();
                                </script>

                                <div class="w-3/5 flex justify-end ">
                                    <ul>
                                        <li class="">
                                            <i class="ri-delete-bin-4-fill mr-3 text-lg text-white"
                                                style="font-size: 22px;"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>

                    </section>

                    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="p-2 flex-grow">
                                <h2 class="text-xl font-semibold text-center">Active and Inactive Users</h2>
                                <div class="w-full h-[300px] flex justify-center items-center">
                                    <canvas id="myBarChart" width="400" height="240"></canvas>
                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    const barchart = document.getElementById('myBarChart');
                                    const chartData = @json($chartData); // Convert PHP array to JSON

                                    new Chart(barchart, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Admin', 'Collector', 'Residents'],
                                            datasets: [{
                                                    label: 'Active Users',
                                                    data: [
                                                        chartData.admin.active,
                                                        chartData.collector.active,
                                                        chartData.residents.active
                                                    ],
                                                    backgroundColor: [
                                                        '#46b953',
                                                        '#46b953',
                                                        '#46b953'
                                                    ],
                                                    borderColor: [
                                                        'rgb(255, 99, 132)',
                                                        'rgb(173, 216, 230)',
                                                        'rgb(255, 159, 64)',
                                                        'rgb(255, 182, 193)',
                                                        'rgb(255, 205, 86)',
                                                        'rgb(255, 222, 173)'
                                                    ],
                                                    borderWidth: 1
                                                },
                                                {
                                                    label: 'Inactive Users',
                                                    data: [
                                                        chartData.admin.inactive,
                                                        chartData.collector.inactive,
                                                        chartData.residents.inactive
                                                    ],
                                                    backgroundColor: [
                                                        '#FF4069',
                                                        '#FF4069',
                                                        '#FF4069'
                                                    ],
                                                    borderColor: [
                                                        'rgb(255, 99, 132)',
                                                        'rgb(173, 216, 230)',
                                                        'rgb(255, 159, 64)',
                                                        'rgb(255, 182, 193)',
                                                        'rgb(255, 205, 86)',
                                                        'rgb(255, 222, 173)'
                                                    ],
                                                    borderWidth: 1
                                                }
                                            ]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true,
                                                    position: 'top',
                                                    labels: {
                                                        boxWidth: 20,
                                                        usePointStyle: true
                                                    }
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>

                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <h2 class="text-xl font-semibold mt-4 text-center mb-8">Status</h2>
                            <div class="p-4 flex-grow">
                                <div class="w-full h-[300px] sm:h-[240px] flex justify-center items-center gap-16">
                                    {{-- <canvas class="flex justify-center items-center" id="myChart"  width="400" height="240"></canvas> --}}

                                    <div class="w-5/5 text-center">
                                        <i class="ri-delete-bin-4-fill mr-3 text-lg text-green-400"
                                            style="font-size: 140px;"></i>
                                        <ul>
                                            <li class="font-bold text-black text-xl mt-3">
                                                Trash Weight Status
                                            </li>
                                            <li class="font-extrabold text-black text-xl" id="trash-weight-status">
                                                {{ $status_truck }}</li>
                                            </li>
                                        </ul>

                                        <script>
                                            function getStatusColor(status) {
                                                // Extract the percentage from the status
                                                var percentage = parseInt(status.replace('%', ''));

                                                // Dynamically determine the color based on the percentage
                                                if (percentage == 0) {
                                                    return 'green'; // Green color for 0%
                                                } else if (percentage >= 90) {
                                                    return 'red'; // Red color for 90% and above
                                                } else if (percentage >= 80) {
                                                    return 'orange'; // Orange color for 80-89%
                                                } else if (percentage >= 60) {
                                                    return 'yellow'; // Yellow color for 60-79%
                                                } else if (percentage >= 40) {
                                                    return '#FFD700'; // Gold color for 40-59%
                                                } else {
                                                    return '#32CD32'; // LimeGreen color for less than 40%
                                                }
                                            }

                                            // Function to fetch updated truck weight
                                            function fetchTrashWeightStatus() {
                                                fetch('/get-trash-weight-status')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        // Update the truck weight in the HTML element
                                                        var trashWeightStatusElement = document.getElementById('trash-weight-status');
                                                        trashWeightStatusElement.textContent = data.status;
                                                        trashWeightStatusElement.style.color = getStatusColor(data.status);
                                                    })
                                                    .catch(error => {
                                                        console.error('Error fetching truck weight:', error);
                                                    });
                                            }

                                            // Function to refresh truck weight every 5 seconds
                                            function autoRefresh2() {
                                                setInterval(fetchTrashWeightStatus, 5000); // Refresh every 5 seconds
                                            }

                                            // Initial call to start auto-refresh
                                            autoRefresh2();
                                        </script>
                                    </div>

                                    <div class="w-5/5 text-center ">
                                        <i class="ri-truck-line text-lg text-green-400" style="font-size: 150px;"></i>
                                        <ul>
                                            <li class="font-bold text-black mt-2 text-xl">
                                                Truck Weight Status
                                            </li>
                                            <li class="font-extrabold text-black text-xl" id="truck-weight-status">
                                                {{ $status_truck }}
                                            </li>
                                        </ul>

                                        <script>
                                            function getStatusColorTruck(status_truck) {
                                                // Extract the percentage from the status
                                                var percentage = parseInt(status_truck.replace('%', ''));

                                                // Dynamically determine the color based on the percentage
                                                if (percentage == 0) {
                                                    return 'green'; // Green color for 0%
                                                } else if (percentage >= 90) {
                                                    return 'red'; // Red color for 90% and above
                                                } else if (percentage >= 80) {
                                                    return 'orange'; // Orange color for 80-89%
                                                } else if (percentage >= 60) {
                                                    return 'yellow'; // Yellow color for 60-79%
                                                } else if (percentage >= 40) {
                                                    return '#FFD700'; // Gold color for 40-59%
                                                } else {
                                                    return '#32CD32'; // LimeGreen color for less than 40%
                                                }
                                            }

                                            function fetchTruckWeightStatus() {
                                                fetch('/get-truck-weight-status')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        var trashWeightStatusElement = document.getElementById('truck-weight-status');
                                                        trashWeightStatusElement.textContent = data.status_truck;
                                                        trashWeightStatusElement.style.color = getStatusColorTruck(data.status_truck);
                                                    })
                                                    .catch(error => {
                                                        console.error('Error fetching truck weight:', error);
                                                    });
                                            }

                                            function autoRefresh3() {
                                                setInterval(fetchTruckWeightStatus, 5000);
                                            }

                                            autoRefresh3();
                                        </script>
                                    </div>

                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                            </div>
                        </div>
                    </section>

                    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="p-4 flex-grow">
                                <h2 class="text-xl font-semibold text-center">Collection of Truck Summary</h2>
                                <div class="w-full h-[300px] flex justify-center items-center">
                                    <canvas id="myTruckBarChart" width="400" height="240"></canvas>
                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    const barcharttruck = document.getElementById('myTruckBarChart');
                                    const chartWeightData = @json($chartWeightData); // Convert PHP array to JSON

                                    new Chart(barcharttruck, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Monthly', 'Weekly', 'Daily'],
                                            datasets: [{
                                                label: 'Truck Collection',
                                                data: [
                                                    chartWeightData.monthly.monthlyData,
                                                    chartWeightData.weekly.weeklyData,
                                                    chartWeightData.daily.dailyData
                                                ],
                                                backgroundColor: [
                                                    'rgb(192 132 252',
                                                    'rgb(192 132 252',
                                                    'rgb(192 132 252',
                                                ],
                                                borderColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 99, 132)',
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true,
                                                    position: 'top',
                                                    labels: {
                                                        boxWidth: 20,
                                                        usePointStyle: true
                                                    }
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>

                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="p-4 flex-grow">
                                <h2 class="text-xl font-semibold text-center">Collection of Trash Bin Summary</h2>
                                <div class="w-full h-[300px] flex justify-center items-center">
                                    <canvas id="myTrashBarChart" width="400" height="240"></canvas>
                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    const barcharttrash = document.getElementById('myTrashBarChart');
                                    const chartWeightTrashData = @json($chartWeightTrashData); // Convert PHP array to JSON

                                    new Chart(barcharttrash, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Monthly', 'Weekly', 'Daily'],
                                            datasets: [{
                                                label: 'Trash Collection',
                                                data: [
                                                    chartWeightTrashData.monthly.monthlyData,
                                                    chartWeightTrashData.weekly.weeklyData,
                                                    chartWeightTrashData.daily.dailyData
                                                ],
                                                backgroundColor: [
                                                    'rgb(253 186 116',
                                                    'rgb(253 186 116',
                                                    'rgb(253 186 116',
                                                ],
                                                borderColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 99, 132)',
                                                    'rgb(255, 99, 132)',
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true,
                                                    position: 'top',
                                                    labels: {
                                                        boxWidth: 20,
                                                        usePointStyle: true
                                                    }
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>
                    </section>

                    <section class="grid grid-cols-1 md:grid-cols-1 gap-6">
                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="p-4 flex-grow">
                                <h2 class="text-xl font-semibold text-center">Trash Bin Summary</h2>
                                <div class="w-full h-[300px] flex justify-center items-center">
                                    <canvas id="myTrashBinChart" width="1000" height="240"></canvas>
                                </div>

                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    const barChartTrash = document.getElementById('myTrashBinChart');
                                    const chartWeightTrashBinData = @json($chartWeightTrashBinData); // Convert PHP array to JSON

                                    new Chart(barChartTrash, {
                                        type: 'bar',
                                        data: {
                                            labels: ['Barangay 176', 'Barangay 177', 'Barangay 178', 'Barangay 179', 'Barangay 180',
                                                'Barangay 181', 'Barangay 182', 'Barangay 183', 'Barangay 184', 'Barangay 185'
                                            ],
                                            datasets: [{
                                                label: 'List of Barangays',
                                                data: [
                                                    chartWeightTrashBinData.barangay.barangay_176,
                                                    chartWeightTrashBinData.barangay.barangay_177,
                                                    chartWeightTrashBinData.barangay.barangay_178,
                                                    chartWeightTrashBinData.barangay.barangay_179,
                                                    chartWeightTrashBinData.barangay.barangay_180,
                                                    chartWeightTrashBinData.barangay.barangay_181,
                                                    chartWeightTrashBinData.barangay.barangay_182,
                                                    chartWeightTrashBinData.barangay.barangay_183,
                                                    chartWeightTrashBinData.barangay.barangay_184,
                                                    chartWeightTrashBinData.barangay.barangay_185,
                                                ],
                                                backgroundColor: [
                                                    'rgb(253, 186, 116)',
                                                    'rgb(253, 206, 116)',
                                                    'rgb(253, 226, 116)',
                                                    'rgb(253, 246, 116)',
                                                    'rgb(233, 253, 116)',
                                                    'rgb(213, 253, 116)',
                                                    'rgb(193, 253, 116)',
                                                    'rgb(173, 253, 116)',
                                                    'rgb(153, 253, 116)',
                                                    'rgb(133, 253, 116)',
                                                ],
                                                borderColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(255, 206, 86)',
                                                    'rgb(75, 192, 192)',
                                                    'rgb(153, 102, 255)',
                                                    'rgb(255, 159, 64)',
                                                    'rgb(75, 192, 192)',
                                                    'rgb(255, 99, 132)',
                                                    'rgb(54, 162, 235)',
                                                    'rgb(255, 206, 86)',
                                                ],

                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            },
                                            plugins: {
                                                legend: {
                                                    display: true,
                                                    position: 'top',
                                                    labels: {
                                                        boxWidth: 20,
                                                        usePointStyle: true
                                                    }
                                                }
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div>

                    </section>

                </main>
            </div>

        </div>
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
    @endif

    @if (Auth::user()->role == 'residents')
        <div class="relative min-h-screen md:flex">

            <!-- mobile menu bar -->
            <div class="bg-white text-black flex justify-end md:hidden">

                <!-- mobile menu button -->
                <button class="mobile-menu-button p-4 focus:outline-none focus:bg-white">
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
                        <li class="mb-1 group active">
                            <a href="{{ asset('dashboard') }}"
                                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                                <i class="ri-dashboard-fill mr-3 text-lg"></i>
                                <span class="text-sm">Dashboard</span>
                            </a>
                        </li>
                        <li class="mb-1 group">
                            <a href="{{ asset('user-schedule') }}"
                                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                                <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                                <span class="text-sm">Schedule</span>
                            </a>
                        </li>
                        <li class="mb-1 group">
                            <a href="{{ asset('augmented-reality') }}"
                                class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                                <i class="ri-ink-bottle-line mr-3 text-lg"></i>
                                <span class="text-sm">Augmented Reality</span>
                            </a>
                        </li>
                        <li class="mb-1 group">
                            <a href="{{ asset('residents-trash-bin') }}"
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            logout?</h3>
                        <div class="flex justify-end items-end">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a :href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-3 text-center">
                                    <i class="ri-logout-box-line mr-1 text-lg"></i>
                                    <span class="text-sm">Logout</span>
                                </a>
                            </form>
                            <div class="absolute mr-[100px] -mb-2.5">
                                <button onclick="document.getElementById('logoutModal').classList.add('hidden')"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-3 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="flex-grow text-gray-800">
                <main class="p-6 sm:p-10 space-y-6">
                    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <h2 class="text-xl font-semibold mt-6 text-center mb-8">Truck Weight Status test</h2>
                            <div class="p-4 flex-grow mt-2">
                                <div class="w-full h-[300px] sm:h-[240px] flex justify-center items-center gap-16">
                                    <div class="w-5/5 text-center ">
                                        <i class="ri-truck-line text-lg text-green-400" style="font-size: 150px;"></i>
                                        <ul>
                                            <li class="font-bold text-black mt-2 text-xl">
                                                {{-- Truck Weight Status --}}
                                            </li>
                                            <li class="font-extrabold text-black text-xl" id="truck-weight-status">
                                                {{ $status_truck }}
                                            </li>
                                        </ul>

                                        <script>
                                            // Function to fetch updated truck weight
                                            function fetchTruckWeightStatus() {
                                                fetch('/get-truck-weight-status')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        // Update the truck weight in the HTML element
                                                        document.getElementById('truck-weight-status').textContent = data.status_truck;
                                                    })
                                                    .catch(error => {
                                                        console.error('Error fetching truck weight:', error);
                                                    });
                                            }

                                            // Function to refresh truck weight every 5 seconds
                                            function autoRefresh3() {
                                                setInterval(fetchTruckWeightStatus, 5000); // Refresh every 5 seconds
                                            }

                                            // Initial call to start auto-refresh
                                            autoRefresh3();
                                        </script>
                                    </div>

                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                            </div>
                        </div>

                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <h2 class="text-xl font-semibold mt-6 text-center mb-8">Trash Weight Status</h2>
                            <div class="p-4 flex-grow mt-4">
                                <div class="w-full h-[300px] sm:h-[240px] flex justify-center items-center gap-16">
                                    <div class="w-5/5 text-center">
                                        <i class="ri-delete-bin-4-fill mr-3 text-lg text-green-400"
                                            style="font-size: 140px; "></i>
                                        <ul>
                                            {{-- <li class="font-bold text-black text-xl mt-3">
                                                Trash Weight Status
                                            </li> --}}
                                            <li class="font-extrabold text-black text-xl mt-5"
                                                id="trash-weight-status">
                                                {{ $status_trash_bin }}</li>
                                            </li>
                                        </ul>

                                        <script>
                                            // Function to fetch updated truck weight
                                            function fetchTrashWeightStatus() {
                                                fetch('/get-trash-weight-status')
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        // Update the truck weight in the HTML element
                                                        document.getElementById('trash-weight-status').textContent = data.status_trash_bin;
                                                    })
                                                    .catch(error => {
                                                        console.error('Error fetching truck weight:', error);
                                                    });
                                            }

                                            // Function to refresh truck weight every 5 seconds
                                            function autoRefresh2() {
                                                setInterval(fetchTrashWeightStatus, 5000); // Refresh every 5 seconds
                                            }

                                            // Initial call to start auto-refresh
                                            autoRefresh2();
                                        </script>
                                    </div>

                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                            </div>
                        </div>

                        {{-- <div class="flex flex-col bg-white shadow rounded-lg">
                            <h2 class="text-xl font-semibold mt-4 text-center">Roles</h2>
                            <div class="p-4 flex-grow">
                                <div class="w-full h-[300px] sm:h-[240px] flex justify-center items-center">
                                    <canvas class="flex justify-center items-center" id="myChart" width="400"
                                        height="240"></canvas>
                                </div>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <script>
                                    const ctx = document.getElementById('myChart');
                                    new Chart(ctx, {
                                        type: 'doughnut',
                                        data: {
                                            labels: ['Admin', 'Collector', 'Residents'],
                                            datasets: [{
                                                label: 'Number of Users',
                                                data: [
                                                    {{ $countAdmins }},
                                                    {{ $countCollector }},
                                                    {{ $countResidents }}
                                                ],
                                                backgroundColor: [
                                                    '#059BFF',
                                                    '#FF4069',
                                                    '#FF9020',
                                                ],
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            plugins: {
                                                legend: {
                                                    display: true,
                                                    position: 'bottom',
                                                    align: 'center',
                                                    labels: {
                                                        boxWidth: 15,
                                                        padding: 10,
                                                        usePointStyle: true,
                                                        align: 'start', // Align labels to start (left) of legend
                                                    },
                                                    maxItems: 3
                                                }
                                            },
                                            responsive: true,
                                            maintainAspectRatio: false,
                                            scales: {
                                                fontSize: window.innerWidth < 768 ? 7 : 10 // Change font size based on screen width
                                            }
                                        }
                                    });
                                </script>

                            </div>
                        </div> --}}

                    </section>

                    <div class="hidden md:block">
                        <section class="grid grid-cols-4 md:grid-cols-1 gap-6">
                            <div class="flex flex-col  justify-center items-center shadow rounded-lg bg-white">
                                <h2 class="text-3xl font-bold mt-4 text-center mb-8">Types of Waste Disposal</h2>
                            </div>
                        </section>
                    </div>

                    <div class="md:hidden">
                        <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col  justify-center items-center shadow rounded-lg bg-white">
                                <h2 class="text-3xl font-bold mt-4 text-center mb-8">Types of Waste Disposal</h2>
                            </div>
                        </section>
                    </div>

                    <div class="hidden md:block">
                        <section class="grid grid-cols-4 md:grid-cols-1 gap-6">
                            <div class="flex flex-col justify-center items-center shadow rounded-lg bg-white">
                                <h2 class="text-2xl font-bold mt-4 text-center mb-4">What exactly is waste?</h2>
                                <ul class="list-disc text-lg text-gray-700 text-left mb-4">
                                    <li>Unwanted and unusable materials are regarded as non-useful substances.</li>
                                    <li>Garbage is refers to waste that we see in our surroundings.</li>
                                </ul>
                            </div>
                        </section>
                    </div>

                    <div class="md:hidden">
                        <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col justify-center items-center shadow rounded-lg bg-white">
                                <h2 class="text-2xl font-bold mt-4 text-center mb-4">What exactly is waste?</h2>
                                <div class="w-full h-[200px] sm:h-[200px] flex justify-center">
                                    <ul class="list-disc text-lg text-gray-700 text-left mb-4 px-10">
                                        <li>Unwanted and unusable materials are regarded as non-useful substances.</li>
                                        <li>Garbage is refers to waste that we see in our surroundings.</li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="hidden md:block">
                        <section class="grid grid-cols-4 md:grid-cols-1 gap-6">
                            <div class="flex flex-col justify-center items-center shadow rounded-lg bg-white">
                                <h2 class="text-2xl font-bold mt-4 text-center mb-4">Types of Waste</h2>
                                <h2 class="text-xl font-gray-100 text-center mb-4 italic">Based on source of waste</h2>
                            </div>
                        </section>
                    </div>

                    <div class="md:hidden">
                        <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col  justify-center items-center shadow rounded-lg bg-white">
                                <h2 class="text-2xl font-bold mt-4 text-center mb-4">Types of Waste</h2>
                                <h2 class="text-xl font-gray-200 text-center mb-4 italic">Based on source of waste</h2>
                            </div>
                        </section>
                    </div>

                    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="flex flex-row justify-center pt-2">
                                <img src="{{ asset('/images/industrial-waste.png') }}" class="w-14 h-auto mr-1 mt-1">
                                <h2 class="text-xl font-semibold mt-4 text-center">Industrial Waste</h2>
                            </div>
                            <div class="p-4 flex-grow">
                                <div class="w-full h-[200px] sm:h-[140px] flex justify-center">
                                    <div class="w-5/5 text-center px-4 md:px-6"> <!-- Added text-center class -->
                                        {{-- <ul>
                                            <li class="font-bold text-black mt-2 text-xl">
                                            </li>
                                            <li class="font-extrabold text-black text-xl" id="truck-weight-status">
                                            </li>
                                        </ul> --}}
                                        <ul class="list-disc text-lg text-gray-700 text-left mb-4">
                                            <li>Manufacturing and industrial waste.</li>
                                            <li>For example, plastic and glass.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="flex flex-row justify-center pt-2">
                                <img src="{{ asset('/images/commercial-waste.png') }}" class="w-12 h-auto mr-2 mt-1">
                                <h2 class="text-xl font-semibold mt-4 text-center">Commercial Waste</h2>
                            </div>
                            <div class="p-4 flex-grow">
                                <div class="w-full h-[200px] sm:h-[140px] flex justify-center">
                                    <div class="w-5/5 text-center px-4 md:px-6">
                                        {{-- <ul>
                                            <li class="font-bold text-black mt-2 text-xl">
                                            </li>
                                            <li class="font-extrabold text-black text-xl" id="truck-weight-status">
                                            </li>
                                        </ul> --}}
                                        <ul class="list-disc text-lg text-gray-700 text-left mb-4">
                                            <li>Produced colleges, retail stores, and offices.</li>
                                            <li>Example: plastic, papaer, tin or aluminum can, etc.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="flex flex-row justify-center pt-2">
                                <img src="{{ asset('/images/domestic-waste.png') }}" class="w-12 h-auto mr-2 mt-1">
                                <h2 class="text-xl font-semibold mt-4 text-center">Domestic Waste</h2>
                            </div>
                            <div class="p-4 flex-grow">
                                <div class="w-full h-[200px] sm:h-[140px] flex justify-center">
                                    <div class="w-5/5 text-center px-4 md:px-6">
                                        {{-- <ul>
                                            <li class="font-bold text-black mt-2 text-xl">
                                            </li>
                                            <li class="font-extrabold text-black text-xl" id="truck-weight-status">
                                            </li>
                                        </ul> --}}
                                        <ul class="list-disc text-lg text-gray-700 text-left mb-4">
                                            <li>The various household wastes that are generated during </br>
                                                household activities such as cooking and cleaning.</li>
                                            <li>Garbage is refers to waste that we see in our surroundings.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col bg-white shadow rounded-lg">
                            <div class="flex flex-row justify-center pt-2">
                                <img src="{{ asset('/images/agricultural-waste.png') }}"
                                    class="w-12 h-auto mr-2 mt-1">
                                <h2 class="text-xl font-semibold mt-4 text-center">Agricultural Waste</h2>
                            </div>
                            <div class="p-4 flex-grow">
                                <div class="w-full h-[200px] sm:h-[140px] flex justify-center">
                                    <div class="w-5/5 text-center px-4 md:px-6">
                                        {{-- <ul>
                                            <li class="font-bold text-black mt-2 text-xl">
                                            </li>
                                            <li class="font-extrabold text-black text-xl" id="truck-weight-status">
                                            </li>
                                        </ul> --}}
                                        <ul class="list-disc text-lg text-gray-700 text-left mb-4">
                                            <li>Waste Generated in the agricultural industry.</li>
                                            <li>Example: cattle waste weed, husk, etc.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    {{-- <section class="grid grid-cols-4 md:grid-cols-1 gap-6">
                        <div class="flex flex-col  justify-center items-center shadow rounded-lg bg-blue-300">
                            <h2 class="text-xl font-semibold mt-4 text-center mb-8">Types of Waste Disposal</h2>
                            <div class="flex gap-10">
                                <!-- First column -->
                                <div class="mb-4 bg-red-300">
                                    Sample
                                </div>
                                <div class="mb-4 bg-red-300">
                                    Sample
                                </div>
                            </div>
                            <div class="flex">
                                <!-- Second column -->
                                <div class="mb-4 bg-red-300">
                                    Sample
                                </div>
                                <div class="mb-4 bg-red-300">
                                    Sample
                                </div>
                            </div>
                            <div class="flex">
                                <!-- Third column -->
                                <div class="mb-4 bg-red-300">
                                    Sample
                                </div>
                                <div class="mb-4 bg-red-300">
                                    Sample
                                </div>
                            </div>
                        </div>

                    </section> --}}

                </main>
            </div>

        </div>
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
    @endif

</x-app-layout>
