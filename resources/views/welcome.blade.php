<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Waste Disposal Tracking System</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('/images/Waste-Logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="antialiased">

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-white dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8 mt-2">
            <div
                class="flex flex-col lg:flex-row justify-center items-center bg-white rounded-xl mb-8 lg:mb-32 gap-x-14 p-4 lg:p-8">
                <img src="{{ asset('/images/Waste-Logo.png') }}" alt="Waste Logo"
                    class="h-[320px] lg:h-[520px] w-auto bg-gray-100 dark:bg-gray-900 rounded-full mb-4 lg:mb-0">
                <div
                    class="w-full lg:w-[600px] bg-white text-center py-6 lg:py-10 px-4 lg:px-10 rounded-xl shadow-xl border border-gray-500 sm:rounded-full">
                    <h1 class="text-xl lg:text-4xl font-bold mb-4">Waste Disposal Tracking System</h1>
                    <p class="text-base lg:text-lg">
                        Introducing the Waste Disposal Tracking System for District 3 of Caloocan City—a smart solution
                        designed to streamline waste collection. This software keeps tabs on garbage pickup schedules,
                        ensuring residents are informed, while helping authorities manage waste responsibly from start
                        to finish. It's a step towards cleaner surroundings and greener practices.
                    </p>
                </div>
            </div>

            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white flex justify-center text-center">WASTE
                DISPOSAL TRACKING SYSTEM sda 2023 - 2024</h2>

            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white flex justify-center">Members</h2>

            <div class="mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <a href=""
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="flex flex-col md:justify-center md:items-center">
                            <div
                                class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <img src="{{ asset('/images/casoco-pic.jpg') }}" class="rounded-full">
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Lead Developer</h2>
                        </div>

                        <div class="w-2/4 flex justify-center items-center">
                            <p class=" text-gray-700 dark:text-gray-500 text-sm leading-relaxed flex flex-col md:ml-8">
                                Social Media:
                                <label>Facebook: Andrei Kevin Casoco</label>
                                <label>Github: Andrei Casoco</label>
                                <label>Contact Number: 09094191380</label>
                            </p>
                        </div>
                    </a>

                    <a href=""
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="flex flex-col md:justify-center md:items-center">
                            <div
                                class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <img src="{{ asset('/images/grifaldea-pic.jpg') }}" class="rounded-full">
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Front End Developer
                            </h2>

                        </div>

                        <div class="w-2/4 flex justify-center items-center">
                            <p
                                class=" text-gray-700 dark:text-gray-500 text-sm leading-relaxed flex flex-col md:justify-normal md:ml-14 -ml-4">
                                Social Media:
                                <label>Facebook: Jay-ar Dela Cruz Grifaldea</label>
                                <label>Github: Jaytzy024</label>
                                <label>Contact Number: 09122580523</label>
                            </p>
                        </div>
                    </a>

                    <a href=""
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="flex flex-col md:justify-center md:items-center">
                            <div
                                class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <img src="{{ asset('/images/devilla-pic.png') }}" class="rounded-full">
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Project Manager</h2>

                        </div>

                        <div class="w-2/4 flex justify-center items-center">
                            <p
                                class=" text-gray-700 dark:text-gray-500 text-sm leading-relaxed flex flex-col md:justify-normal md:ml-4">
                                Social Media:
                                <label>Facebook: Noel De Villa</label>
                                <label>Github: Noel De Villa</label>
                                <label>Contact Number: 09514409673</label>
                            </p>
                        </div>
                    </a>

                    <a href=""
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="flex flex-col md:justify-center md:items-center">
                            <div
                                class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <img src="{{ asset('/images/torres-pic.png') }}" class="rounded-full">
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Researcher-Documents
                            </h2>

                        </div>

                        <div class="w-2/4 flex justify-center items-center">
                            <p
                                class="text-gray-700 dark:text-gray-500 text-sm leading-relaxed flex flex-col md:justify-normal md:ml-2 -ml-5">
                                Social Media:
                                <label>Facebook: Patricia Lynn C. Torres</label>
                                <label>Github: Patricia Lynn Torres</label>
                                <label>Contact Number: 09704881156</label>
                            </p>
                        </div>
                    </a>

                    <a href=""
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="flex flex-col md:justify-center md:items-center">
                            <div
                                class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <img src="{{ asset('/images/co-pic.png') }}" class="rounded-full">
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Resource Manager</h2>

                        </div>

                        <div class="w-2/4 flex justify-center items-center">
                            <p
                                class=" text-gray-700 dark:text-gray-500 text-sm leading-relaxed flex flex-col md:justify-normal -ml-2">
                                Social Media:
                                <label>Facebook: John Maynard R. Co</label>
                                <label>Github: John Maynard Co</label>
                                <label>Contact Number: 09668792231</label>
                            </p>
                        </div>
                    </a>

                    <a href=""
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div class="flex flex-col md:justify-center md:items-center md:ml-6">
                            <div
                                class="h-20 w-20 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                <img src="{{ asset('/images/villamor-pic.png') }}" class="rounded-full">
                            </div>

                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Resource Manager</h2>

                        </div>

                        <div class="w-2/4 flex justify-center items-center">
                            <p
                                class=" text-gray-700 dark:text-gray-500 text-sm leading-relaxed flex flex-col md:justify-normal md:ml-14 -ml-2">
                                Social Media:
                                <label>Facebook: Micaela Paula D. Villamor</label>
                                <label>Github: Micaela Paula Villamor</label>
                                <label>Contact Number: 09307296980</label>
                            </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                    <div class="flex items-center gap-4">
                        <a href="https://www.facebook.com/kevs404"
                            class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5"
                                class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            Kev404
                        </a>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    {{-- Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) --}}
                    WDTS v3.02
                </div>
            </div>
        </div>
    </div>
</body>

</html>
