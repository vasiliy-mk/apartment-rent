@extends('layout')
@section('title')
{{trans('front/map.map_title')}}
@stop

@section('content')

<div id="map" class="map"></div>
<script>





    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: {lat: 0, lng: 0}
        });
        startAddress();

        var image = '{{Url()}}/public/images/home.png';
         @foreach($apartments as $apartment)

        var marker{{$apartment->id}} = new google.maps.Marker({
            map: map,
            icon: image,
            position: {lat: {{$apartment->map_lat}}, lng: {{$apartment->map_lng}}},

    });

    // Construct a new InfoWindow.
    var infoWindow{{$apartment->id}}= new google.maps.InfoWindow({
        content: '<a href="{{Url('/apartment/'.$apartment->id).add_slug($apartment->slug)}}">' +
            ' {{trans('front/apartment.id')}}: {{$apartment->id}} | ' +
            '{{$apartment->rooms}} {{trans('front/map.rooms')}} | ' +
            '{{$apartment->price}} {{trans('admin/settings.main.'.$settings['currency'])}}/{{trans('front/apartment.night')}}'+
        '</a> ' +
            '<p align="center">{{$apartment->street}}, {{$apartment->house}}</p>'+
            '<p align="center"><img class="apartment_ico" src="{{App\Apartment::firstPhoto($apartment->photos,$apartment->id)}}" width="150" alt=""/></p>',

        maxWidth: 250
    });

    // Opens the InfoWindow when marker is clicked.
    marker{{$apartment->id}}.addListener('click', function() {
        infoWindow{{$apartment->id}}.open(map, marker{{$apartment->id}});
    });


    @endforeach

        function startAddress() {
            var geocoder = new google.maps.Geocoder();
            var country  = '{{$settings["country"]}}';
            var city     = '{{$settings["city"]}}';
            var address  = city + "," + country;

            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    map.setCenter(results[0].geometry.location);
                }
            });
        }


   }


    jQuery(function($) {
        // Responsive height
        var shift = 185;
        $('#map').height($( window ).height()-shift);
        $(window).resize(function(){
           $('#map').height($( window ).height()-shift);
            console.log( $('#map').height());
        });
    });

</script>
<script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAa3ETi-mQ5CdaeT87TlW_KhUHN2qUJNQ&signed_in=true&language={{$settings['language']}}&libraries=places&callback=initMap"></script>
@stop
