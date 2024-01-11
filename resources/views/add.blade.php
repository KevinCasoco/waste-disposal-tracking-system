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
        <div class="sidebar bg-white text-black w-64 space-y-6 py-1 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out z-20">

        <!-- nav -->
        <nav>
       <ul class="mt-2" >
        <li class="mb-1 group">
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
           <li class="mb-1 group active">
            <a href="{{ asset('schedule')}}" class="flex items-center py-2 px-4 text-black hover:bg-[#4ECE5D] hover:text-gray-100 rounded-md group-[.active]:bg-[#4ECE5D] group-[.active]:text-white group-[.selected]:bg-[#4ECE5D] group-[.selected]:text-white">
                    <i class="ri-calendar-2-fill mr-3 text-lg"></i>
                   <span class="text-sm">Schedule</span>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        form {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 20px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 20px;
            background-color: green;
            color: white;
        }

    </style>

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

    <form action="{{ route('schedule.create') }}" method="POST">
        @csrf
        <h1 class="mt-2 text-2xl font-bold text-center">Waste Collection Schedule</h1>

        <label for='title'>{{ __('Location') }}</label>

        <select name="title" id='title' name='title' class="form-control" required>
            <option value="#">Location</option>
            <option value="Barangay 168">Barangay 168</option>
            <option value="Barangay 169">Barangay 169</option>
            <option value="Barangay 170">Barangay 170</option>
            <option value="Barangay 171">Barangay 171</option>
            <option value="Barangay 172">Barangay 172</option>
            <option value="Barangay 173">Barangay 173</option>
            <option value="Barangay 174">Barangay 174</option>
            <option value="Barangay 175">Barangay 175</option>
            <option value="Barangay 176">Barangay 176</option>
        </select>


        <label for="start">Date of Collection</label>
        <input type='date' class='form-control' id='start' name='start' required value='{{ now()->toDateString() }}'>

        <label for="time">Time of Collection</label>
        <input type="time" class='form-control' id="time" name="time" required>

        <script>
          // Get the current time in the "HH:mm" format
          var currentTime = new Date().toLocaleTimeString('en-US', { hour12: false, hour: '2-digit', minute: '2-digit' });

          // Set the current time as the value for the "Time" input
          document.getElementById('time').value = currentTime;
        </script>

        <input type="submit" value="Save" class="btn btn-success" />
    </form>
</body>
</html>

@endif

</x-app-layout>
