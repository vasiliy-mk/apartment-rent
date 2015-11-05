
@if($settings['apartment_map'])
    <div class="row">
            <div class="col-lg-12">
            <div class="divider"><h1>{{trans('front/apartment.map')}}</h1></div>

            <div id="map" class="apartment-map"></div>
            <script>

            function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: {lat: {{$apartment->map_lat}}, lng: {{$apartment->map_lng}}}
            });

            var image = '{{Url()}}/public/images/home.png';

            var marker{{$apartment->id}} = new google.maps.Marker({
            map: map,
            icon: image,
            position: {lat: {{$apartment->map_lat}}, lng: {{$apartment->map_lng}}},

            });

            }

            </script>
            <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAa3ETi-mQ5CdaeT87TlW_KhUHN2qUJNQ&signed_in=true&libraries=places&language={{$settings['language']}}&callback=initMap"></script>

        </div>
    </div>
@endif



