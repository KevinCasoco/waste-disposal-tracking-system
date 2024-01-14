<x-app-layout>
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

</x-app-layout>


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
