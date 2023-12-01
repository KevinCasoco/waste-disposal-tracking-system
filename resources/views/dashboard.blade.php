<x-app-layout>
    @if (Auth::user()->role == 'admin')
        <!-- START SIDEBAR -->
        <div class="fixed left-0 top-0 w-60 h-full bg-white p-4">
            <a class="flex item-center pb-4 border-b border-b-gray-700">
                <img src="{{ asset('/images/Waste-Logo.png') }}" alt="" class="w-16 h-16 rounded object-cover">
                <span class="text-lg font-extrabold text-black ml-1">Waste Disposal Tracking System</span>
            </a>

            <ul class="mt-2">
                <li class="mb-1 group active">
                    <a href="{{ asset('dashboard') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-dashboard-fill mr-3 text-lg"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('admin') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-admin-fill mr-3 text-lg"></i>
                        <span class="text-sm">Admin</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('collector') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-map-pin-user-fill mr-3 text-lg"></i>
                        <span class="text-sm">Collector</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('residents') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-user-fill mr-3 text-lg"></i>
                        <span class="text-sm">Residents</span>
                    </a>
                </li>
                <li class="mb-1 group">
                    <a href="{{ asset('schedule') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
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

        <!-- START MAIN -->
        <main class="w-full md:w-[calc(100%-240px)] md:ml-60 bg-slate-200  min-h-screen transition-all main">
            <!-- START DASHBOARD -->
            <div class="bg-slate-200 h-screen w-full overflow-y-auto">
                {{-- {{$chart}} --}}
                <div class="p-8">
                    <div class="grid grid-cols-1 md:cols-2 lg:grid-cols-4 gap-4 lg:gap-8">
                        <a href="{{ route('admin') }}">
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
                        </a>
                        <a href="{{ asset('collector') }}">
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
                        <a href="{{ asset('residents') }}">
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
                        <div
                            class="p-4 bg-[#4ECE5D] rounded-lg flex items-center h-32 shadow-lg hover:bg-[#46b953] hover:shadow-xl">
                            <div class="w-3/5 flex justify-start">
                                <ul>
                                    <li class="font-bold text-white">Total Users</li>
                                    <li class="font-extrabold text-white text-xl">{{ $totalUser }}</li>
                                    <i class="ri-admin-fill text-white"></i>
                                </ul>
                            </div>
                        </div>


                        <!-- Component Start -->
                        <div
                            class="flex flex-col items-center w-full max-w-screen-md p-3 pb-3 bg-white rounded-lg shadow-xl sm:p-3 col-span-2 ">
                            {{-- bar Chart --}}
                            <div class="w-[100%] h-[100%] flex justify-center items-center">
                                <canvas id="myBarChart" class="w-[100%] h-[100%]"></canvas>
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
                                            label: 'Active',
                                            data: [
                                                chartData.admin.active,
                                                chartData.collector.active,
                                                chartData.residents.active
                                            ],
                                            backgroundColor: [
                                                '#FF9020',
                                                '#FF4069',
                                                '#059BFF',
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                        {{-- barChart --}}

                        <div
                            class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 bg-white rounded-lg shadow-xl sm:p-5 col-span-2 ">
                            {{-- Doughnut Chart --}}
                            <div>
                                <canvas id="myChart" class="w-[80%]"></canvas>
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
                                                '#FF9020',
                                                '#FF4069',
                                                '#059BFF',
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                        {{-- Doughnut Chart --}}


                    </div>

                </div>
            </div>
        </main>
        <!-- END MAIN -->
    @endif

    @if (Auth::user()->role == 'collector')
        <!-- START SIDEBAR -->
        <div class="fixed left-0 top-0 w-60 h-full bg-white p-4">
            <a class="flex item-center pb-4 border-b border-b-gray-700">
                <img src="{{ asset('/images/Waste-Logo.png') }}" alt="" class="w-16 h-16 rounded object-cover">
                <span class="text-lg font-extrabold text-black ml-1">Waste Disposal Tracking System</span>
            </a>

            <ul class="mt-2">
                <li class="mb-1 group active">
                    <a href="{{ asset('dashboard') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
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
                    <a href="#"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-map-fill mr-3 text-lg"></i>
                        <span class="text-sm">Location</span>
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

        <!-- START MAIN -->
        <main class="w-full md:w-[calc(100%-240px)] md:ml-60 bg-slate-200  min-h-screen transition-all main">
            <!-- START DASHBOARD -->
            <div class="bg-slate-200 h-screen w-full overflow-y-auto">
                <div class="p-8">
                    <div class="grid grid-cols-1 md:cols-2 lg:grid-cols-4 gap-4 lg:gap-8">

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
                                    <i class="ri-admin-fill text-white"></i>
                                </ul>
                            </div>
                        </div>



                       <!-- Component Start -->
                       <div
                       class="flex flex-col items-center w-full max-w-screen-md p-3 pb-3 bg-white rounded-lg shadow-xl sm:p-3 col-span-2 ">
                       {{-- bar Chart --}}
                       <div class="w-[100%] h-[100%] flex justify-center items-center">
                           <canvas id="myBarChart" class="w-[100%] h-[100%]"></canvas>
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
                                       label: 'Active',
                                       data: [
                                           chartData.admin.active,
                                           chartData.collector.active,
                                           chartData.residents.active
                                       ],
                                       backgroundColor: [
                                           '#FF9020',
                                           '#FF4069',
                                           '#059BFF',
                                       ],
                                       borderColor: [
                                           'rgb(255, 99, 132)',
                                           'rgb(255, 159, 64)',
                                           'rgb(255, 205, 86)',
                                       ],
                                       borderWidth: 1
                                   }]
                               },
                               options: {
                                   scales: {
                                       y: {
                                           beginAtZero: true
                                       }
                                   }
                               }
                           });
                       </script>
                   </div>
                   {{-- barChart --}}

                   <div
                       class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 bg-white rounded-lg shadow-xl sm:p-5 col-span-2 ">
                       {{-- Doughnut Chart --}}
                       <div>
                           <canvas id="myChart" class="w-[80%]"></canvas>
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
                                       borderWidth: 1
                                   }]
                               },
                               options: {
                                   scales: {
                                       y: {
                                           beginAtZero: true
                                       }
                                   }
                               }
                           });
                       </script>
                   </div>
                   {{-- Doughnut Chart --}}
                    </div>
                </div>
            </div>
        </main>
        <!-- END MAIN -->
    @endif

    @if (Auth::user()->role == 'residents')
        <!-- START SIDEBAR -->
        <div class="fixed left-0 top-0 w-60 h-full bg-white p-4">
            <a class="flex item-center pb-4 border-b border-b-gray-700">
                <img src="{{ asset('/images/Waste-Logo.png') }}" alt=""
                    class="w-16 h-16 rounded object-cover">
                <span class="text-lg font-extrabold text-black ml-1">Waste Disposal Tracking System</span>
            </a>

            <ul class="mt-2">
                <li class="mb-1 group active">
                    <a href="{{ asset('dashboard') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
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
                    <a href="{{ asset('user-residents') }}"
                        class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                        <i class="ri-user-fill mr-3 text-lg"></i>
                        <span class="text-sm">Residents</span>
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

        <!-- START MAIN -->
        <main class="w-full md:w-[calc(100%-240px)] md:ml-60 bg-slate-200  min-h-screen transition-all main">
            <!-- START DASHBOARD -->
            <div class="bg-slate-200 h-screen w-full overflow-y-auto">
                <div class="p-8">
                    <div class="grid grid-cols-1 md:cols-2 lg:grid-cols-4 gap-4 lg:gap-8">

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
                        <div
                            class="p-4 bg-[#4ECE5D] rounded-lg flex items-center h-32 shadow-lg hover:bg-[#46b953] hover:shadow-xl">
                            <div class="w-3/5 flex justify-start">
                                <ul>
                                    <li class="font-bold text-white">Total Users</li>
                                    <li class="font-extrabold text-white text-xl">{{ $totalUser }}</li>
                                    <i class="ri-admin-fill text-white"></i>
                                </ul>
                            </div>
                        </div>



                        <!-- Component Start -->
                        <!-- Component Start -->
                        <div
                            class="flex flex-col items-center w-full max-w-screen-md p-3 pb-3 bg-white rounded-lg shadow-xl sm:p-3 col-span-2 ">
                            {{-- bar Chart --}}
                            <div class="w-[100%] h-[100%] flex justify-center items-center">
                                <canvas id="myBarChart" class="w-[100%] h-[100%]"></canvas>
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
                                            label: 'Active',
                                            data: [
                                                chartData.admin.active,
                                                chartData.collector.active,
                                                chartData.residents.active
                                            ],
                                            backgroundColor: [
                                                '#FF9020',
                                                '#FF4069',
                                                '#059BFF',
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                        {{-- barChart --}}

                        <div
                            class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 bg-white rounded-lg shadow-xl sm:p-5 col-span-2 ">
                            {{-- Doughnut Chart --}}
                            <div>
                                <canvas id="myChart" class="w-[80%]"></canvas>
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
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                        {{-- Doughnut Chart --}}
                    </div>
                </div>
            </div>

        </main>

        <!-- END MAIN -->
    @endif

</x-app-layout>
