<x-app-layout>
    @if (Auth::user()->role == 'admin')

    <!-- START SIDEBAR -->
    <div class="fixed left-0 top-0 w-60 h-full bg-white p-4">
        <a class="flex item-center pb-4 border-b border-b-gray-700">
            <img src="{{asset('/images/Waste-Logo.png')}}" alt="" class="w-16 h-16 rounded object-cover">
            <span class="text-lg font-extrabold text-black ml-1">Waste Disposal Tracking System</span>
        </a>

        <ul class="mt-2" >
            <li class="mb-1 group active">
                <a href="{{ asset('dashboard')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                    <i class="ri-dashboard-fill mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li class="mb-1 group">
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

    <!-- START MAIN -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        <!-- START DASHBOARD -->
        <div class="bg-slate-200 h-screen w-full overflow-y-auto">
            <div class="p-8">
                <div class="grid grid-cols-1 md:cols-2 lg:grid-cols-4 gap-4 lg:gap-8">
                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Admin</li>
                                <li class="font-extrabold text-slate-800 text-xl">{{ $countAdmins }}</li>
                                <i class="ri-admin-fill mr-3 text-lg"></i>
                            </ul>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Collector</li>
                                <li class="font-extrabold text-slate-800 text-xl">{{ $countCollector }}</li>
                                <i class="ri-map-pin-user-fill mr-3 text-lg"></i>
                            </ul>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Residents</li>
                                <li class="font-extrabold text-slate-800 text-xl">{{ $countResidents }}</li>
                                <i class="ri-user-fill mr-3 text-lg"></i>
                            </ul>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Truck</li>
                                <li class="font-extrabold text-slate-800 text-xl">5</li>
                                <i class="ri-truck-fill"></i>
                            </ul>
                        </div>
                    </div>


     <!-- Component Start -->
	<div class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 bg-white rounded-lg shadow-xl sm:p-8 col-span-2 ">
		<h2 class="text-xl font-bold">Waste Collection</h2>
		<span class="text-sm font-semibold text-gray-500">OCTOBER 2023</span>
		<div class="flex items-end flex-grow w-full mt-2 space-x-2 sm:space-x-3">
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block"></span>
				<div class="relative flex justify-center w-full h-8 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-16 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">178</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$45,000</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">179</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">180</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$50,000</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">181</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">182</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$55,000</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">183</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$60,000</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-16 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">184</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$57,500</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-10 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">185</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$67,500</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-10 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-32 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">186</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$65,000</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-12 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full bg-indigo-400 h-28"></div>
				<span class="absolute bottom-0 text-xs font-bold">187</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$70,000</span>
				<div class="relative flex justify-center w-full h-8 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-40 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">188</span>
			</div>
		</div>
	</div>
	<!-- Bar Chart End  -->

        <!-- Pie Chart Start -->
                    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                        <div class="flex justify-between mb-2 items-start">
                            <div class="font-medium">Barangay</div>
                        </div>

                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {

                                var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['Brgy 178',     11],
                                ['Brgy 179',      2],
                                ['Brgy 180',  2],
                                ['Brgy 181', 2],
                                ['Brgy 182',    7]
                                ]);

                                var options = {

                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                chart.draw(data, options);
                            }
                        </script>
                        <div id="piechart" style="width: 420px; height: 295px;"></div>
                    </div>
                    <!-- Pie Chart End -->
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
            <img src="{{asset('/images/Waste-Logo.png')}}" alt="" class="w-16 h-16 rounded object-cover">
            <span class="text-lg font-extrabold text-black ml-1">Waste Disposal Tracking System</span>
        </a>

        <ul class="mt-2" >
            <li class="mb-1 group active">
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

    <!-- START MAIN -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        <!-- START DASHBOARD -->
        <div class="bg-slate-200 h-screen w-full overflow-y-auto">
            <div class="p-8">
                <div class="grid grid-cols-1 md:cols-2 lg:grid-cols-4 gap-4 lg:gap-8">
                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Admin</li>
                                <li class="font-extrabold text-slate-800 text-xl">{{ $countAdmins }}</li>
                                <i class="ri-admin-fill mr-3 text-lg"></i>
                            </ul>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Collector</li>
                                <li class="font-extrabold text-slate-800 text-xl">{{ $countCollector }}</li>
                                <i class="ri-map-pin-user-fill mr-3 text-lg"></i>
                            </ul>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Residents</li>
                                <li class="font-extrabold text-slate-800 text-xl">{{ $countResidents }}</li>
                                <i class="ri-user-fill mr-3 text-lg"></i>
                            </ul>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Truck</li>
                                <li class="font-extrabold text-slate-800 text-xl">5</li>
                                <i class="ri-truck-fill"></i>
                            </ul>
                        </div>
                    </div>


     <!-- Component Start -->
	<div class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 bg-white rounded-lg shadow-xl sm:p-8 col-span-2 ">
		<h2 class="text-xl font-bold">Waste Collection</h2>
		<span class="text-sm font-semibold text-gray-500">OCTOBER 2023</span>
		<div class="flex items-end flex-grow w-full mt-2 space-x-2 sm:space-x-3">
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block"></span>
				<div class="relative flex justify-center w-full h-8 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-16 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">178</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$45,000</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">179</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">180</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$50,000</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">181</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">182</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$55,000</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">183</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$60,000</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-16 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">184</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$57,500</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-10 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">185</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$67,500</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-10 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-32 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">186</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$65,000</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-12 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full bg-indigo-400 h-28"></div>
				<span class="absolute bottom-0 text-xs font-bold">187</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$70,000</span>
				<div class="relative flex justify-center w-full h-8 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-40 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">188</span>
			</div>
		</div>
	</div>
	<!-- Bar Chart End  -->

        <!-- Pie Chart Start -->
                    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                        <div class="flex justify-between mb-2 items-start">
                            <div class="font-medium">Barangay</div>
                        </div>

                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {

                                var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['Brgy 178',     11],
                                ['Brgy 179',      2],
                                ['Brgy 180',  2],
                                ['Brgy 181', 2],
                                ['Brgy 182',    7]
                                ]);

                                var options = {

                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                chart.draw(data, options);
                            }
                        </script>
                        <div id="piechart" style="width: 420px; height: 295px;"></div>
                    </div>
                    <!-- Pie Chart End -->
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
            <img src="{{asset('/images/Waste-Logo.png')}}" alt="" class="w-16 h-16 rounded object-cover">
            <span class="text-lg font-extrabold text-black ml-1">Waste Disposal Tracking System</span>
        </a>

        <ul class="mt-2" >
            <li class="mb-1 group active">
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
            <li class="mb-1 group">
                <a href="{{ asset('user-sched')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
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

    <!-- START MAIN -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        <!-- START DASHBOARD -->
        <div class="bg-slate-200 h-screen w-full overflow-y-auto">
            <div class="p-8">
                <div class="grid grid-cols-1 md:cols-2 lg:grid-cols-4 gap-4 lg:gap-8">
                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Admin</li>
                                <li class="font-extrabold text-slate-800 text-xl">{{ $countAdmins }}</li>
                                <i class="ri-admin-fill mr-3 text-lg"></i>
                            </ul>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Collector</li>
                                <li class="font-extrabold text-slate-800 text-xl">{{ $countCollector }}</li>
                                <i class="ri-map-pin-user-fill mr-3 text-lg"></i>
                            </ul>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Residents</li>
                                <li class="font-extrabold text-slate-800 text-xl">{{ $countResidents }}</li>
                                <i class="ri-user-fill mr-3 text-lg"></i>
                            </ul>
                        </div>
                    </div>

                    <div class="p-4 bg-white rounded-lg flex items-center h-32 shadow-sm">
                        <div class="w-3/5 flex justify-start">
                            <ul>
                                <li class="font-bold text-gray-400">Truck</li>
                                <li class="font-extrabold text-slate-800 text-xl">5</li>
                                <i class="ri-truck-fill"></i>
                            </ul>
                        </div>
                    </div>


     <!-- Component Start -->
	<div class="flex flex-col items-center w-full max-w-screen-md p-6 pb-6 bg-white rounded-lg shadow-xl sm:p-8 col-span-2 ">
		<h2 class="text-xl font-bold">Waste Collection</h2>
		<span class="text-sm font-semibold text-gray-500">OCTOBER 2023</span>
		<div class="flex items-end flex-grow w-full mt-2 space-x-2 sm:space-x-3">
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block"></span>
				<div class="relative flex justify-center w-full h-8 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-16 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">178</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$45,000</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">179</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">180</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$50,000</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-6 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">181</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$47,500</span>
				<div class="relative flex justify-center w-full h-10 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">182</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$55,000</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">183</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$60,000</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-16 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-20 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">184</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$57,500</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-10 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-24 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">185</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$67,500</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-10 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-32 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">186</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$65,000</span>
				<div class="relative flex justify-center w-full h-12 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-12 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full bg-indigo-400 h-28"></div>
				<span class="absolute bottom-0 text-xs font-bold">187</span>
			</div>
			<div class="relative flex flex-col items-center flex-grow pb-5 group">
				<span class="absolute top-0 hidden -mt-6 text-xs font-bold group-hover:block">$70,000</span>
				<div class="relative flex justify-center w-full h-8 bg-indigo-200"></div>
				<div class="relative flex justify-center w-full h-8 bg-indigo-300"></div>
				<div class="relative flex justify-center w-full h-40 bg-indigo-400"></div>
				<span class="absolute bottom-0 text-xs font-bold">188</span>
			</div>
		</div>
	</div>
	<!-- Bar Chart End  -->

        <!-- Pie Chart Start -->
                    <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2">
                        <div class="flex justify-between mb-2 items-start">
                            <div class="font-medium">Barangay</div>
                        </div>

                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                            google.charts.load('current', {'packages':['corechart']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {

                                var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['Brgy 178',     11],
                                ['Brgy 179',      2],
                                ['Brgy 180',  2],
                                ['Brgy 181', 2],
                                ['Brgy 182',    7]
                                ]);

                                var options = {

                                };

                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                chart.draw(data, options);
                            }
                        </script>
                        <div id="piechart" style="width: 420px; height: 295px;"></div>
                    </div>
                    <!-- Pie Chart End -->
                </div>
            </div>
        </div>
    </main>
    <!-- END MAIN -->
    @endif

</x-app-layout>
