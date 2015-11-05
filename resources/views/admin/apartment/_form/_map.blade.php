
<style>

    #map_container {
        height: 500px;
        border: 1px solid #cccccc;
        margin: 5px;
    }

    pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    .pac-container {
        font-family: Roboto;
    }

    #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
    }

    #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }
</style>
<div class="panel panel-default border-top-none">
    <div class="panel-body">
        <div class="row">
            <div id="map_container"></div>
                <input type="hidden" name="map_lat" id="map_lat" value="{{$apartment->map_lat}}"/>
                <input type="hidden" name="map_lng" id="map_lng" value="{{$apartment->map_lng}}"/>
                <input id="pac-input" class="controls" type="text" placeholder="Search Box">


        </div>
    </div>
</div>

    <script>

// СДЕЛАТЬ БЛОКИРОВКУ ЕСЛИ МАРКЕР ВРУЧНУЮ ПЕРЕМЕЩЕН

        function initMap() {

            var image = domain_url+'/public/images/home.png';

            var map_lat = parseFloat(document.getElementById("map_lat").value);
            var map_lng = parseFloat(document.getElementById("map_lng").value);
            var map = new google.maps.Map(document.getElementById('map_container'), {
                zoom: 14,
                center: {lat: map_lat, lng: map_lng}
            });

            var marker = new google.maps.Marker({
                map: map,
                icon: image,
                position: {lat: map_lat, lng: map_lng}

                });

            if(!map_lat || !map_lng){
                startAddress();
            }



            google.maps.event.addListener(map, 'click', function(event) {
                marker.setPosition(event.latLng);
                marker.setMap(map);
                marker.setAnimation(google.maps.Animation.set);
                updateLatLngInputs()
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });


            $("a[href='#map']").on('shown.bs.tab', function(){
                google.maps.event.trigger(map, 'resize');

            });


            $("#street,#house").on('change', function(){
                codeAddress();
            });

            function updateLatLngInputs(){
                document.getElementById("map_lat").value = marker.getPosition().lat();
                document.getElementById("map_lng").value = marker.getPosition().lng();
            }

            function codeAddress() {
                var geocoder = new google.maps.Geocoder();
                var country = document.getElementById("country").value;
                var city = document.getElementById("city").value;
                var street = document.getElementById("street").value;
                var house = document.getElementById("house").value;
                var address = street +"," + house +"," + city + "," + country;

                geocoder.geocode( { 'address': address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        if (marker && marker.setPosition) {
                            marker.setPosition(results[0].geometry.location);
                        } else {
                            marker = new google.maps.Marker({
                                map: map,
                                position: results[0].geometry.location
                            });

                        }
                       updateLatLngInputs()
                    } else {
                      //  alert('Geocode was not successful for the following reason: ' + status);
                    }
                });

            }



            function startAddress() {
                var geocoder = new google.maps.Geocoder();
                var country  = document.getElementById("country").value;
                var city     = document.getElementById("city").value;
                var address  = city + "," + country;

                geocoder.geocode( { 'address': address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        if (marker && marker.setPosition) {
                            marker.setPosition(results[0].geometry.location);
                        } else {
                            marker = new google.maps.Marker({
                                map: map,
                                position: results[0].geometry.location
                            });

                        }
                        updateLatLngInputs()
                    }
                });
            }

        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAa3ETi-mQ5CdaeT87TlW_KhUHN2qUJNQ&signed_in=true&libraries=places&language={{$settings['language']}}&callback=initMap"></script>

