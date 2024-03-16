<x-app-layout>
    @if (Auth::user()->role == 'admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('dashboard') }}"><i class="ri-arrow-left-s-line mr-3"></i></a> <i class="ri-dashboard-fill mr-3 text-lg"></i>{{ __('Dashboard') }}
        </h2>
    </x-slot>
       <!-- Content -->
<div class="flex justify-center items-center py-4">
    <div class="w-full mx-6">
        <form id="trash_bin_form" method="post" action="{{ route('admin-trash-bin.create') }}">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trash Bin Location (Barangay or City):</label>
                <input id="trash_bin_location" type="text" name="trash_bin_location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-900 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Barangay or City" required />
            </div>
            <!-- Add hidden inputs for latitude and longitude -->
            <input type="hidden" id="latitude" name="latitude">
            <input type="hidden" id="longitude" name="longitude">
            <div class="flex justify-end gap-x-2 mb-6">
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Trash Bin</button>
            </div>
        </form>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3NkyX1hnbnQy-i5JmEVM65SRPXjfisPo&callback=initMap" defer></script>
        <script>
            var map;
            var trashBinMarkers = [];

            function initMap() {
                var wiseChoiceLocation = {
                    lat: 14.7108,
                    lng: 121.0562
                }; // Novaliches, Quezon City

                map = new google.maps.Map(document.getElementById("map"), {
                    center: wiseChoiceLocation,
                    zoom: 12,
                });

                var directionsService = new google.maps.DirectionsService();
                var directionsRenderer = new google.maps.DirectionsRenderer({
                    map: map,
                });

                @foreach($trashBins as $trashBin)
                var marker = new google.maps.Marker({
                    position: { lat: {{ $trashBin->latitude }}, lng: {{ $trashBin->longitude }} },
                    map: map,
                    title: "Trash Bin Location"
                });
                @endforeach

                // Function to add trash bin marker to the map
                function addTrashBinMarker(lat, lng) {
                    var trashBinLocation = new google.maps.LatLng(lat, lng);
                    var trashBinMarker = new google.maps.Marker({
                        position: trashBinLocation,
                        map: map,
                        title: "Trash Bin Location"
                    });
                    trashBinMarkers.push(trashBinMarker); // Add marker to the array
                }

                // Handle form submission to add trash bin marker
                document.getElementById('trash_bin_form').addEventListener('submit', function (event) {
                    event.preventDefault(); // Prevent form submission
                    var trashBinLocation = document.getElementById('trash_bin_location').value;

                    // Use Google Maps Geocoding API to convert address to coordinates
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ 'address': trashBinLocation }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            var trashBinLat = results[0].geometry.location.lat();
                            var trashBinLng = results[0].geometry.location.lng();

                            // Set the values of latitude and longitude hidden inputs
                            document.getElementById('latitude').value = trashBinLat;
                            document.getElementById('longitude').value = trashBinLng;

                            // Add trash bin marker to the map
                            addTrashBinMarker(trashBinLat, trashBinLng);

                            // Now submit the form
                            document.getElementById('trash_bin_form').submit();
                        } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                });
                        }
                    </script>

                    <!-- Map Container -->
                    <div id="map" style="height: 700px;" class=""></div>
                </div>
            </div>
            <!-- End Content -->
    @endif
</x-app-layout>
