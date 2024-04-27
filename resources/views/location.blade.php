{{-- <x-app-layout>
    @if (Auth::user()->role == 'collector')

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Realtime location tracker</title>

            <!-- leaflet css  -->
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

            <style>
                body {
                    margin: 0;
                    padding: 0;
                }

                #map {
                    width: 100%;
                    height: 100vh;
                }
            </style>
        </head>

        <body>
            <div id="map"></div>
        </body>

        <!-- leaflet js  -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script>
            // Map initialization
            var map = L.map('map').setView([0, 0], 2); // Default view, can be any coordinates and zoom level

            // osm layer
            var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            });
            osm.addTo(map);

            if (!navigator.geolocation) {
                console.log("Your browser doesn't support geolocation feature!")
            } else {
                navigator.geolocation.getCurrentPosition(getPosition);
            }

            var marker, circle;

            function getPosition(position) {
                var lat = position.coords.latitude
                var long = position.coords.longitude
                var accuracy = position.coords.accuracy

                if (marker) {
                    map.removeLayer(marker)
                }

                if (circle) {
                    map.removeLayer(circle)
                }

                marker = L.marker([lat, long])
                circle = L.circle([lat, long], { radius: accuracy })

                var featureGroup = L.featureGroup([marker, circle]).addTo(map)

                map.fitBounds(featureGroup.getBounds())

                console.log("Your coordinate is: Lat: " + lat + " Long: " + long + " Accuracy: " + accuracy)
            }
        </script>
    </html>

@endif

</x-app-layout> --}}


{{-- <x-app-layout>
    @if (Auth::user()->role == 'collector')
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Realtime location tracker</title>

            <!-- Google Maps API -->
            <script src="https://maps.googleapis.com/maps/api/js?key={{ config("services.google_maps.api_key") }}&libraries=places"></script>

            <style>
                body {
                    margin: 0;
                    padding: 0;
                }

                #map {
                    width: 100%;
                    height: 100vh;
                }
            </style>
        </head>

        <body>
            <div id="map"></div>

            <script>
                // Map initialization
                var map;
                var marker;

                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: { lat: 0, lng: 0 }, // Default center, can be any coordinates
                        zoom: 2 // Default zoom level
                    });

                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(getPosition);
                    } else {
                        console.log("Your browser doesn't support geolocation feature!")
                    }
                }

                function getPosition(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    var accuracy = position.coords.accuracy;

                    if (marker) {
                        marker.setMap(null);
                    }

                    marker = new google.maps.Marker({
                        position: { lat: lat, lng: lng },
                        map: map,
                        title: 'Your Location'
                    });

                    var circle = new google.maps.Circle({
                        center: { lat: lat, lng: lng },
                        radius: accuracy,
                        map: map,
                        fillColor: '#007BFF',
                        fillOpacity: 0.2,
                        strokeColor: '#007BFF',
                        strokeOpacity: 0.8,
                        strokeWeight: 2
                    });

                    map.setCenter({ lat: lat, lng: lng });

                    console.log("Your coordinate is: Lat: " + lat + " Lng: " + lng + " Accuracy: " + accuracy);
                }
            </script>

            <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config("services.google_maps.api_key") }}&libraries=places&callback=initMap"></script>
        </body>

        </html>
    @endif
</x-app-layout> --}}

<x-app-layout>
    @if (Auth::user()->role == 'collector')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('dashboard') }}"><i class="ri-arrow-left-s-line mr-3"></i></a> <i class="ri-dashboard-fill mr-3 text-lg"></i>{{ __('Dashboard') }}
        </h2>
    </x-slot>
        <!-- Content -->
        <div class="flex justify-center items-center py-4 ">
            {{-- For Web View --}}
            {{-- <div class="w-full mx-6 sm:w-full hidden md:block"> --}}
            <div class="w-full mx-6 sm:w-full">
                <div class="flex justify-center flex-col">
                    <form>
                        {{-- <div class="text-center mb-5">
                    <h1 class="text-2xl font-bold" style="cursor: default;">Google Maps</h1>
                </div> --}}

                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City Hall</label>
                        <input id="wise_choice_location" type="text" name="wisehoice"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="964 Quirino Hwy, Novaliches, Quezon City, 1123 Metro Manila" disabled />
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                        <select id="address" type="text" id="address" name="location"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block mb-3 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white w-full"
                            required>
                            <option value="">Select Address</option>
                            @foreach ($locations as $id => $location)
                                <?php
                                // Split the address by commas
                                $parts = explode(',', $location);
                                // Extract the second part and remove leading/trailing spaces
                                $secondValue = trim($parts[1]);
                                ?>
                                <option value="{{ $location }}">{{ $secondValue }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plate No:</label>
                        <input id="plate_no" type="text" name="plate_no" value="{{ Auth::user()->plate_no }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            disabled />
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Distance:</label>
                        <input id="transportation_time" type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            readonly />
                    </div>
                </div>

                        <div
                            class="flex justify-center gap-x-2 mb-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">
                            <button id="track_order_button" type="button" class="text-white p-2.5 w-full">Go</button>
                        </div>
                    </form>
                </div>
                <!-- Map Container -->
                <div id="map" style="height: 700px;" class=""></div>
            </div>



            <!-- Replace YOUR_API_KEY with your actual API key -->
            <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMap"
                defer></script>
            <script>
                function initMap() {
                    var wiseChoiceLocation = {
                        lat: 14.7108,
                        lng: 121.0562
                    }; // Novaliches, Quezon City

                    var map = new google.maps.Map(document.getElementById("map"), {
                        center: wiseChoiceLocation,
                        zoom: 12,
                    });

                    var directionsService = new google.maps.DirectionsService();
                    var directionsRenderer = new google.maps.DirectionsRenderer({
                        map: map,
                    });

                    @foreach($trashBins as $trashBin)
                    var iconSize = new google.maps.Size(32, 32); // Adjust the size as needed
                    var marker = new google.maps.Marker({
                        position: { lat: {{ $trashBin->latitude }}, lng: {{ $trashBin->longitude }} },
                        map: map,
                        title: "Trash Bin Location",
                        icon: {
                            url: '{{ asset("/images/Waste-Logo.png") }}',
                            scaledSize: iconSize
                        }
                    });
                    @endforeach

                    // Trigger button click event after page is loaded
                    window.addEventListener('load', function() {
                        document.getElementById('track_order_button').click();
                    });

                    document.getElementById('track_order_button').addEventListener('click', function() {
                        var customerAddress = document.getElementById('address').value;

                        var request = {
                            origin: wiseChoiceLocation,
                            destination: customerAddress,
                            travelMode: google.maps.TravelMode.DRIVING,
                            drivingOptions: {
                                departureTime: new Date(Date.now()), // Current time
                                trafficModel: 'bestguess' // Default value
                            }
                        };

                        directionsService.route(request, function(result, status) {
                            if (status == google.maps.DirectionsStatus.OK) {
                                directionsRenderer.setDirections(result);

                                // Display motorcycle travel duration
                                var motorcycleDuration = result.routes[0].legs[0].duration.text;
                                document.getElementById('transportation_time').value = motorcycleDuration;
                            } else {
                                console.error("Directions request failed due to " + status);
                            }
                        });
                    });
                }
            </script>

            <script>
                // Function to extract the second value from an address
                function extractSecondValue(address) {
                    // Split the address by commas
                    var parts = address.split(',');
                    // Extract the second part and remove leading/trailing spaces
                    var secondValue = parts[1].trim();
                    return secondValue;
                }

                // Extract second values from the addresses
                var value1 = extractSecondValue(address1);

                // Add extracted values to the dropdown list
                var dropdown = document.getElementById("address");
                var option1 = document.createElement("option");
                option1.text = value1;
                option1.value = value1;
                dropdown.add(option1);
            </script>

    @endif
</x-app-layout>
