<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div> --}}

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const region = document.getElementById('region');
        const provinces = document.getElementById('province');
        const municipalityOrCity = document.getElementById('city');
        const barangay = document.getElementById('barangay');

        // Fetch Regions data from the API
        fetch('https://psgc.gitlab.io/api/regions/')
            .then(response => response.json())
            .then(data => {
                const selectElement = document.getElementById('region');
                // Iterate through the data and create options for the select input
                data.forEach(region => {
                    const option = document.createElement('option');
                    option.value = region.code;
                    option.text = region.name + " - " + region.regionName;
                    selectElement.appendChild(option);
                });

                // Automatically select NCR
                const ncrCode = '130000000'; // NCR code
                selectElement.value = ncrCode;

                // Trigger the change event
                const changeEvent = new Event('change');
                selectElement.dispatchEvent(changeEvent);
            })
            .catch(error => {
                console.error('Error:', error);
            });

           // Event listener for provinces selection
           region.addEventListener('change', () => {
            const selectedProvinces = region.value;
            // Clear the provinces select input
            provinces.innerHTML = '<option disabled selected>Select Provinces</option>';
            // Fetch data for the selected provinces
            fetch(`https://psgc.gitlab.io/api/regions/${selectedProvinces}/provinces/`)
                .then(response => response.json())
                .then(data => {
                    // Populate the provinces select input
                    data.forEach(province => {
                        const option = document.createElement('option');
                        option.value = province.code;
                        option.text = province.name;
                        provinces.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        const selectedProvince = provinces.value;

        // Check if the selected province is NCR
        const isNCR = selectedProvince === '130000000'; // Assuming '13' is the code for NCR

        // Clear the municipalities/cities select input
        municipalityOrCity.innerHTML = '<option disabled selected>Select Municipality or City</option>';

        // If the selected province is not NCR, fetch and populate municipalities/cities
        if (!isNCR) {
            fetch(`https://psgc.gitlab.io/api/provinces/${selectedProvince}/cities-municipalities`)
                .then(response => response.json())
                .then(data => {
                    // Populate the city select input
                    data.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.code;
                        option.text = city.name;
                        municipalityOrCity.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

          // Event listener for Municipality/City without province selection
          region.addEventListener('change', () => {
            const selectedCity = region.value;
            // Clear the provinces select input
            municipalityOrCity.innerHTML = '<option disabled selected>Select Municipality or City</option>';
            // Fetch data for the selected region
            fetch(`https://psgc.gitlab.io/api/regions/${selectedCity}/cities-municipalities/`)
                .then(response => response.json())
                .then(data => {
                    // Populate the City select input
                    data.forEach(city => {
                        const option = document.createElement('option');
                        option.value = city.code;
                        option.text = city.name;
                        municipalityOrCity.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });

        // Event listener for Barangay selection
        municipalityOrCity.addEventListener('change', () => {
            const selectedCity = municipalityOrCity.value;
            // Clear the provinces select input
            barangay.innerHTML = '<option disabled selected>Select Barangay</option>';
            // Fetch data for the selected region
            fetch(`https://psgc.gitlab.io/api/cities-municipalities/${selectedCity}/barangays/`)
                .then(response => response.json())
                .then(data => {
                    // Populate the Barangay select input
                    data.forEach(brgy => {
                        const option = document.createElement('option');
                        option.value = brgy.code;
                        option.text = brgy.name;
                        barangay.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                });

        });


    });
    </script>
</html>
