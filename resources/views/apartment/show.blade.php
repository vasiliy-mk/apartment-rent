@extends('layout')
@section('title')

@if($apartment->seo_title)
{{$apartment->seo_title}}
@else
Apartment {{$apartment->street}} №{{$apartment->id}}
@endif
@stop
@section('resources')
<script src="{{Url()}}/public/js/apartment.js"></script>
@stop

@section('content')

<div class="row">

    <div class="col-sm-7">
        @include('_slider')
    </div>

    <div class="col-sm-5">
        @if(Auth::check())
        <div class="hover-buttons">
            <a href="{{Url()}}/admin/apartment/{{$apartment->id}}/edit"><i class="glyphicon glyphicon-edit"></i></a>
        </div>
        @endif
        <div class="divider"><h1>{{trans('front/apartment.general')}}</h1></div>
        <div class="row">
            <div class="col-sm-7">
                <ul>
                    <li><b>{{trans('front/apartment.id')}}:</b> {{$apartment->id}}</li>
                    <li><b>{{trans('front/apartment.floor')}}:</b> 5/9 </li>
                    <li><b>{{trans('front/apartment.rooms')}}:</b> {{$apartment->rooms}} </li>
                    <li><b>{{trans('front/apartment.beds')}}: </b>{{$apartment->beds}}</li>
                </ul>
            </div>
            <div class="col-sm-4">
                <div class="apartment-price">
                <div>{{$apartment->price}}</div> {{trans('admin/settings.main.'.$settings['currency'])}}/{{trans('front/apartment.night')}}
                </div>
            </div>
        </div>

        <div class="divider"><h1>{{trans('front/apartment.amenity')}}</h1></div>
        <div class="row apartment-amenities">
             @foreach($amenities as $name=>$id)
            <div class="col-sm-6">
                <i class="glyphicon glyphicon-ok"></i>  {{$name}}
            </div>
            @endforeach

        </div>
        <div class="divider"><h1>{{trans('front/apartment.order')}}</h1></div>
        <div class="row">

            <div class="col-md-12">
                <h3>{{trans('front/index.order_by_phones')}}:</h3>
                <ul class="contact-phones">
                    @foreach($settings['contact_phones'] as $phone)
                    <li>{{$phone}}</a></li>
                    @endforeach
                </ul>            </div>


        </div>
    </div>

</div>
<div class="divider"><h1>{{trans('front/apartment.description')}}</h1></div>
<div class="row">
    <div class="col-sm-12">
        {!!$apartment->description!!}
    </div>
</div>
@include('apartment/_map')
@stop


