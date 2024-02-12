<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Waste Management') }}</title>

        <link rel="icon" type="image/x-icon" href="{{asset('/images/Waste-Logo.png')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Icons --}}
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

        {{-- Callendar Schdule --}}
        <link rel="dns-prefetch" href="//unpkg.com" />
        <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

        <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
        <!--Replace with your tailwind.css once created-->

        <!-- Include the required CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
        <!-- Include jQuery (required) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Include the intl-tel-input JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

        <!--Regular Datatables CSS-->
        <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

        <!-- jQuery Library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Datatable JS -->
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>

        <!-- DataTable JS -->
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> --}}
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>

        <!-- DataTable CSS  -->
        {{-- <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-alpha3/css/bootstrap.min.css"> --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">

        {{-- Export-Files-Buttons --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

        {{-- chart js  --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <style>
            /*Overrides for Tailwind CSS */

            /*Form fields*/
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568;
                /*text-gray-700*/
                padding-left: 1rem;
                /*pl-4*/
                padding-right: 1rem;
                /*pl-4*/
                padding-top: .5rem;
                /*pl-2*/
                padding-bottom: .5rem;
                /*pl-2*/
                line-height: 1.25;
                /*leading-tight*/
                border-width: 2px;
                /*border-2*/
                border-radius: .25rem;
                border-color: #edf2f7;
                /*border-gray-200*/
                background-color: #edf2f7;
                /*bg-gray-200*/
            }

            /*Row Hover*/
            table.dataTable.hover tbody tr:hover,
            table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;
                /*bg-indigo-100*/
            }

            /*Pagination Buttons*/
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Current selected */
            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #4ECE5D !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Hover */
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #4ECE5D !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Add padding to bottom border */
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;
                /*border-b-1 border-gray-300*/
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }

            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
            table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                background-color: #4ECE5D !important;
                /*bg-indigo-500*/
            }
        </style>

         <!-- Datatable CSS -->
         <link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
         <link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>

         <style type="text/css">
            .dt-buttons{
            width: 86%;
            position: relative;
            margin-bottom: 10px;
            margin-top: -50px;

            }
            button.dt-button {
                background-color: #22C55E;
                color: white;
                border: 1px solid;
                border-radius: 11px;
                height: 42px;

                transition: background-color 0.3s ease; /* Add a smooth transition effect */

            }

            button.dt-button:hover {
                background-color: #1c9d4b; /* Change the background color on hover */
                color: black;
            }
         </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        {{-- @include('footer') --}}
    </body>

    <script>
        $(document).ready(function() {
        // Initialize the input field
        var input = document.querySelector("#number");
        var iti = window.intlTelInput(input, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            separateDialCode: true,
            initialCountry: "PH",
            dropdownContainer: document.getElementById('country-selector')
        });

        // Set an event listener to update the selected country
        input.addEventListener("countrychange", function() {
            var countryData = iti.getSelectedCountryData();
            console.log(countryData);
        });
        });
    </script>

    <script>
        const findMyLocation = () => {
            const status = document.querySelector('.status');
            const locationTextarea = document.getElementById('locationTextarea');

            const success = (position) => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                const geoApiUrl = `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&format=json`;

                fetch(geoApiUrl)
                    .then(res => {
                        if (!res.ok) {
                            throw new Error('Failed to retrieve location information');
                        }
                        return res.json();
                    })
                    .then(data => {
                        const address = data.display_name || '';

                        if (address) {
                            status.textContent = '' + address;
                            locationTextarea.value = '' + address;
                        } else {
                            throw new Error('Location information not found');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        status.textContent = 'Error: ' + error.message;
                    });
            };

            const error = (err) => {
                console.error(err);
                status.textContent = 'Unable to retrieve your location';
            };

            navigator.geolocation.getCurrentPosition(success, error);
        };

        // Event listener for the button
        document.getElementById('getLocationBtn').addEventListener('click', findMyLocation);
    </script>


    {{-- googlep maps api with barangay *need credit card* --}}
    {{-- <script>
        const findMyLocation = () => {
        const status = document.querySelector('.status');
        const locationTextarea = document.getElementById('locationTextarea');

        const success = (position) => {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            const apiKey = '{{ config("services.google_maps.api_key") }}';
            const geoApiUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=${apiKey}`;

            fetch(geoApiUrl)
                .then(res => {
                    if (!res.ok) {
                        throw new Error('Failed to retrieve location information');
                    }
                    return res.json();
                })
                .then(data => {
                    if (data.status === 'OK') {
                        const address = data.results[5].formatted_address || '';

                        if (address) {
                            status.textContent = '' + address;
                            locationTextarea.value = '' + address;
                        } else {
                            throw new Error('Location information not found');
                        }
                    } else {
                        throw new Error('Google Maps API request failed');
                    }
                })
                .catch(error => {
                    console.error(error);
                    status.textContent = 'Error: ' + error.message;
                });
        };

        const error = (err) => {
            console.error(err);
            status.textContent = 'Unable to retrieve your location';
        };

        navigator.geolocation.getCurrentPosition(success, error);
    };

    // Event listener for the button
    document.getElementById('getLocationBtn').addEventListener('click', findMyLocation);

    </script> --}}


    {{-- googlep maps api with barangay *need credit card* --}}
    {{-- <script>
        const findMyLocation = () => {
            const status = document.querySelector('.status');
            const locationTextarea = document.getElementById('locationTextarea');

            const success = (position) => {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                const geoApiUrl = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=#########`;

                fetch(geoApiUrl)
                    .then(res => {
                        if (!res.ok) {
                            throw new Error('Failed to retrieve location information');
                        }
                        return res.json();
                    })
                    .then(data => {
                        const results = data.results;
                        if (results.length > 0) {
                            // Extract barangay information from the results
                            const barangay = results[0].address_components.find(component => {
                                return component.types.includes('sublocality_level_1') ||
                                    component.types.includes('sublocality');
                            });

                            const address = barangay ? barangay.long_name : '';

                            if (address) {
                                status.textContent = '' + address;
                                locationTextarea.value = '' + address;
                            } else {
                                throw new Error('Barangay information not found');
                            }
                        } else {
                            throw new Error('Location information not found');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        status.textContent = 'Error: ' + error.message;
                    });
            };

            const error = (err) => {
                console.error(err);
                status.textContent = 'Unable to retrieve your location';
            };

            navigator.geolocation.getCurrentPosition(success, error);
        };

        // Event listener for the button
        document.getElementById('getLocationBtn').addEventListener('click', findMyLocation);
    </script> --}}
</html>
