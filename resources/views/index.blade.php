@extends('layout')
@section('title')
{{$settings['title']}}
@stop
@section('content')
<div class="row">
        <div class="col-md-7 photo-slider">
        @include('_slider')
        </div>
        <div class="col-md-5">
            {!!$settings['description']!!}
            <h3>{{trans('front/index.order_by_phones')}}:</h3>
            <ul class="contact-phones">
                @foreach($settings['contact_phones'] as $phone)
                <li>{{$phone}}</a></li>
                @endforeach
            </ul>

        </div>



</div>
<div class="divider"><h1>{{trans('front/index.apartments')}}</h1></div>
<div class="row">

    @foreach($apartments as $apartment)
      @include('apartment/_apartment')
    @endforeach

</div>

<div align="right">{!!$apartments->render()!!}</div>

@stop

