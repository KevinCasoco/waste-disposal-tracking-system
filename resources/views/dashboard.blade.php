<x-app-layout>
    @if (Auth::user()->role == 'admin')

    <div class="relative min-h-screen md:flex">

        <!-- mobile menu bar -->
        <div class="bg-white text-black flex justify-end md:hidden">

          <!-- mobile menu button -->
          <button class="mobile-menu-button p-4 focus:outline-none focus:bg-white">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>

        <!-- sidebar -->
        <div class="sidebar bg-white text-black w-64 space-y-6 py-1 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20 shadow">

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
                        <i class="ri-map-pin-user-fill mr-3 text-lg"></i>
                        <span class="text-sm">Collector</span>
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
<!--Logout Modals -->
        <!-- Logout Modal -->
        <div id="logoutModal" class="hidden fixed inset-0 overflow-y-auto flex items-center justify-center z-30">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden transform transition-all flex justify-end p-2">
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-col">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to logout?</h3>
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

                <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                  <a href="{{ route('admin') }}">
                  <div class="flex items-center p-6 bg-blue-500 hover:bg-blue-600 shadow-lg  rounded-lg hover:shadow-xl">

                      <div class="w-3/5 flex justify-start">
                          <ul>
                              <li class="font-extrabold text-white">
                                  Admin</li>
                              <li class="font-extrabold text-white text-xl">{{ $countAdmins }}</li>
                              <i class="ri-admin-fill mr-3 text-lg text-white"></i>
                          </ul>
                      </div>
                  </div>
                  </a>

                  <a href="{{ asset('collector') }}">
                      <div class="flex items-center p-6 bg-[#FF4069] hover:bg-[#e5395e] shadow-lg rounded-lg hover:shadow-xl">

                          <div class="w-3/5 flex justify-start">
                              <ul>
                                  <li class="font-extrabold text-white">
                                      Collector</li>
                                  <li class="font-extrabold text-white text-xl">{{ $countCollector }}</li>
                                  <i class="ri-map-pin-user-fill mr-3 text-lg text-white"></i>
                              </ul>
                          </div>
                      </div>

                      <a href="{{ asset('residents') }}">
                          <div class="flex items-center p-6 bg-orange-400  hover:bg-orange-500 shadow-lg rounded-lg hover:shadow-xl">

                              <div class="w-3/5 flex justify-start">
                                  <ul>
                                      <li class="font-bold text-white">Residents</li>
                                      <li class="font-extrabold text-white text-xl">{{ $countResidents }}</li>
                                      <i class="ri-user-fill mr-3 text-lg text-white"></i>
                                  </ul>
                              </div>
                          </div>
                          </a>
                              <div class="flex items-center p-6 bg-[#4ECE5D] hover:bg-[#46b953] shadow-lg rounded-lg hover:shadow-xl">

                                  <div class="w-3/5 flex justify-start">
                                      <ul>
                                          <li class="font-bold text-white">Total Users</li>
                                          <li class="font-extrabold text-white text-xl">{{ $totalUser }}</li>
                                          <i class="ri-user-fill mr-3 text-lg text-white"></i>
                                      </ul>
                                  </div>
                              </div>
                </section>

                {{-- Chart --}}
                <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
                  <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
                    {{-- <div class="px-6 py-5 font-semibold border-b border-gray-100">Your insights will appear here soon.</div> --}}
                    <div class="p-4 flex-grow">
                      <div class="w-[100%] h-[100%] flex justify-center items-center">
                          <canvas id="myBarChart"></canvas>
                      </div>

                      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                      <script>
                        const barchart = document.getElementById('myBarChart');
                        const chartData = @json($chartData); // Convert PHP array to JSON

                        new Chart(barchart, {
                            type: 'bar',
                            data: {
                                labels: ['Admin (Active)', 'Admin (Inactive)', 'Collector (Active)', 'Collector (Inactive)', 'Residents (Active)', 'Residents (Inactive)'],
                                datasets: [{
                                    label: 'Active and Inactive Users',
                                    data: [
                                        chartData.admin.active,
                                        chartData.admin.inactive,
                                        chartData.collector.active,
                                        chartData.collector.inactive,
                                        chartData.residents.active,
                                        chartData.residents.inactive
                                    ],
                                    backgroundColor: [
                                        // '#059BFF',
                                        // '#7EB6FF',
                                        // '#FF4069',
                                        // '#FFA0C2',
                                        // '#FF9020',
                                        // '#FFDCA6'
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
                  <div class="flex items-center flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
                      <div class="w-[60%] px-6 py-5 font-semibold border-b border-gray-100"> <div>
                          <canvas id="myChart"></canvas>
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
                                        align: 'center', // Optional: Align the legend items to the center
                                        labels: {
                                            boxWidth: 15, // Optional: Adjust the box width of legend items
                                            padding: 10, // Optional: Add padding between legend items
                                            usePointStyle: true, // Optional: Use point style for legend items
                                        },
                                        maxItems: 3 // Set the maximum number of items to fit in one line
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
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>

        <!-- sidebar -->
        <div class="sidebar bg-white text-black w-64 space-y-6 py-1 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20">

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
                    <a href="{{ asset('collector-residents') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-user-fill mr-3 text-lg"></i>
                        <span class="text-sm">Collector</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('collector-schedule') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                        <span class="text-sm">Schedule</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('location')}}"
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
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to logout?</h3>
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

 	    <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
              <div
                            class="p-4 bg-blue-500 rounded-lg flex items-center h-32 shadow-lg hover:bg-blue-600 hover:shadow-xl">
                            <div class="w-3/5 flex justify-start">
                                <ul>
                                    <li class="font-bold text-white">
                                        Admin</li>
                                    <li class="font-extrabold text-white text-xl">{{ $countAdmins }}</li>
                                    <i class="ri-admin-fill mr-3 text-lg text-white"></i>
                                </ul>
                            </div>
                        </div>

                        <a href="{{ asset('collector-residents') }}">
                            <div
                            class="p-4 bg-[#FF4069] rounded-lg flex items-center h-32 shadow-lg hover:bg-[#e5395e] hover:shadow-xl">
                                <div class="w-3/5 flex justify-start">
                                    <ul>
                                        <li class="font-bold text-white">Collector</li>
                                        <li class="font-extrabold text-white text-xl">{{ $countCollector }}</li>
                                        <i class="ri-map-pin-user-fill mr-3 text-lg text-white"></i>
                                    </ul>
                                </div>
                            </div>
                        </a>

                        <div
                            class="p-4 bg-orange-400 rounded-lg flex items-center h-32 shadow-lg hover:bg-orange-500 hover:shadow-xl">
                            <div class="w-3/5 flex justify-start">
                                <ul>
                                    <li class="font-bold text-white">Residents</li>
                                    <li class="font-extrabold text-white text-xl">{{ $countResidents }}</li>
                                    <i class="ri-user-fill mr-3 text-lg text-white"></i>
                                </ul>
                            </div>
                        </div>

                        <div
                            class="p-4 bg-[#4ECE5D] rounded-lg flex items-center h-32 shadow-lg hover:bg-[#46b953] hover:shadow-xl">
                            <div class="w-3/5 flex justify-start">
                                <ul>
                                    <li class="font-bold text-white">Total Users</li>
                                    <li class="font-extrabold text-white text-xl">{{ $totalUser }}</li>
                                    <i class="ri-user-fill text-white"></i>
                                </ul>
                            </div>
                        </div>
		</section>

	            {{-- Chart --}}
                <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
                  <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
                    {{-- <div class="px-6 py-5 font-semibold border-b border-gray-100">Your insights will appear here soon.</div> --}}
                    <div class="p-4 flex-grow">
                      <div class="w-[100%] h-[100%] flex justify-center items-center">
                          <canvas id="myBarChart"></canvas>
                      </div>

                      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                      <script>
                        const barchart = document.getElementById('myBarChart');
                        const chartData = @json($chartData); // Convert PHP array to JSON

                        new Chart(barchart, {
                            type: 'bar',
                            data: {
                                labels: ['Admin (Active)', 'Admin (Inactive)', 'Collector (Active)', 'Collector (Inactive)', 'Residents (Active)', 'Residents (Inactive)'],
                                datasets: [{
                                    label: 'Active and Inactive Users',
                                    data: [
                                        chartData.admin.active,
                                        chartData.admin.inactive,
                                        chartData.collector.active,
                                        chartData.collector.inactive,
                                        chartData.residents.active,
                                        chartData.residents.inactive
                                    ],
                                    backgroundColor: [
                                        // '#059BFF',
                                        // '#7EB6FF',
                                        // '#FF4069',
                                        // '#FFA0C2',
                                        // '#FF9020',
                                        // '#FFDCA6'
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
                  <div class="flex items-center flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
                      <div class="w-[60%] px-6 py-5 font-semibold border-b border-gray-100"> <div>
                          <canvas id="myChart"></canvas>
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
                                        align: 'center', // Optional: Align the legend items to the center
                                        labels: {
                                            boxWidth: 15, // Optional: Adjust the box width of legend items
                                            padding: 10, // Optional: Add padding between legend items
                                            usePointStyle: true, // Optional: Use point style for legend items
                                        },
                                        maxItems: 3 // Set the maximum number of items to fit in one line
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
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>

        <!-- sidebar -->
        <div class="sidebar bg-white text-black w-64 space-y-6 py-1 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20">

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
                {{-- <li class="mb-1 group">
                    <a href="{{ asset('kitchen-waste') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-ink-bottle-line mr-3 text-lg"></i>
                        <span class="text-sm">Kitchen Waste</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('recyclable-waste') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-recycle-fill mr-3 text-lg"></i>
                        <span class="text-sm">Recyclable Waste</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('hazardous-waste') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-paint-fill mr-3 text-lg"></i>
                        <span class="text-sm">Hazardous Waste</span>
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
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to logout?</h3>
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

                <section class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">
                    <div class="p-4 bg-blue-500 rounded-lg flex items-center h-32 shadow-lg hover:bg-blue-600 hover:shadow-xl">
                            <div class="w-3/5 flex justify-start">
                                <ul>
                                    <li class="font-bold text-white">
                                        Admin</li>
                                    <li class="font-extrabold text-white text-xl">{{ $countAdmins }}</li>
                                    <i class="ri-admin-fill mr-3 text-lg text-white"></i>
                                </ul>
                            </div>
                        </div>

                        <div
                            class="p-4 bg-[#FF4069] rounded-lg flex items-center h-32 shadow-lg hover:bg-[#e5395e] hover:shadow-xl">
                            <div class="w-3/5 flex justify-start">
                                <ul>
                                    <li class="font-bold text-white">Collector</li>
                                    <li class="font-extrabold text-white text-xl">{{ $countCollector }}</li>
                                    <i class="ri-map-pin-user-fill mr-3 text-lg text-white"></i>
                                </ul>
                            </div>
                        </div>

                        <a href="{{ asset('user-residents') }}">
                            <div
                                class="p-4 bg-orange-400 rounded-lg flex items-center h-32 shadow-lg hover:bg-orange-500 hover:shadow-xl">
                                <div class="w-3/5 flex justify-start">
                                    <ul>
                                        <li class="font-bold text-white">Residents</li>
                                        <li class="font-extrabold text-white text-xl">{{ $countResidents }}</li>
                                        <i class="ri-user-fill mr-3 text-lg text-white"></i>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <div class="p-4 bg-[#4ECE5D] rounded-lg flex items-center h-32 shadow-lg hover:bg-[#46b953] hover:shadow-xl">
                            <div class="w-3/5 flex justify-start">
                                <ul>
                                    <li class="font-bold text-white">Total Users</li>
                                    <li class="font-extrabold text-white text-xl">{{ $totalUser }}</li>
                                    <i class="ri-user-fill text-white"></i>
                                </ul>
                        </div>
                    </div>
		        </section>

	            {{-- Chart --}}
                <section class="grid md:grid-cols-2 xl:grid-cols-4 xl:grid-rows-3 xl:grid-flow-col gap-6">
                  <div class="flex flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
                    {{-- <div class="px-6 py-5 font-semibold border-b border-gray-100">Your insights will appear here soon.</div> --}}
                    <div class="p-4 flex-grow">
                      <div class="w-[100%] h-[100%] flex justify-center items-center">
                          <canvas id="myBarChart"></canvas>
                      </div>

                      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                      <script>
                        const barchart = document.getElementById('myBarChart');
                        const chartData = @json($chartData); // Convert PHP array to JSON

                        new Chart(barchart, {
                            type: 'bar',
                            data: {
                                labels: ['Admin (Active)', 'Admin (Inactive)', 'Collector (Active)', 'Collector (Inactive)', 'Residents (Active)', 'Residents (Inactive)'],
                                datasets: [{
                                    label: 'Active and Inactive Users',
                                    data: [
                                        chartData.admin.active,
                                        chartData.admin.inactive,
                                        chartData.collector.active,
                                        chartData.collector.inactive,
                                        chartData.residents.active,
                                        chartData.residents.inactive
                                    ],
                                    backgroundColor: [
                                        // '#059BFF',
                                        // '#7EB6FF',
                                        // '#FF4069',
                                        // '#FFA0C2',
                                        // '#FF9020',
                                        // '#FFDCA6'
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
                  <div class="flex items-center flex-col md:col-span-2 md:row-span-2 bg-white shadow rounded-lg">
                      <div class="w-[60%] px-6 py-5 font-semibold border-b border-gray-100"> <div>
                          <canvas id="myChart"></canvas>
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
                                        align: 'center', // Optional: Align the legend items to the center
                                        labels: {
                                            boxWidth: 15, // Optional: Adjust the box width of legend items
                                            padding: 10, // Optional: Add padding between legend items
                                            usePointStyle: true, // Optional: Use point style for legend items
                                        },
                                        maxItems: 3 // Set the maximum number of items to fit in one line
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

</x-app-layout>
